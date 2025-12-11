<?php

namespace App\Filament\Resources\RoomTrackingLinks\Tables;

use App\Models\RoomTrackingLink;
use App\Models\RoomGroup;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoomTrackingLinksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('link_name')
                    ->label('Campaign Name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn($record) => $record->description ? Str::limit($record->description, 50) : null),

                TextColumn::make('room_name')
                    ->label('Room Type')
                    ->badge()
                    ->color('info')
                    ->formatStateUsing(fn($state) => $state),

                TextColumn::make('link_code')
                    ->label('Code')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Link code copied!')
                    ->copyMessageDuration(1500)
                    ->badge()
                    ->color('gray'),

                TextColumn::make('clicks')
                    ->label('Clicks')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->description(fn($record) => number_format($record->unique_clicks) . ' unique'),

                TextColumn::make('bookings_count')
                    ->label('Bookings')
                    ->numeric()
                    ->sortable()
                    ->alignCenter()
                    ->badge()
                    ->color('success'),

                TextColumn::make('total_nights_booked')
                    ->label('Nights')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),

                TextColumn::make('revenue_generated')
                    ->label('Revenue')
                    ->money('NGN')
                    ->sortable()
                    ->weight('bold')
                    ->color('success'),

                IconColumn::make('status')
                    ->boolean()
                    ->label('Active')
                    ->alignCenter()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Action::make('copy_link')
                    ->label('Copy Link')
                    ->icon('heroicon-o-clipboard')
                    ->color('primary')
                    ->requiresConfirmation(false)
                    ->action(function ($record) {
                        Notification::make()
                            ->title('Link Copied!')
                            ->success()
                            ->body($record->full_url)
                            ->send();
                    })
                    ->dispatch('copy-to-clipboard', fn($record) => ['text' => $record->full_url])
                    ->extraAttributes([
                        'x-on:click' => "\$dispatch('copy-to-clipboard', { text: \$el.dataset.url }); \$event.stopPropagation();"
                    ])
                    ->extraAttributes(fn($record) => [
                        'data-url' => $record->full_url,
                        'onclick' => "navigator.clipboard.writeText(this.dataset.url).then(() => { 
                            new FilamentNotification()
                                .title('Link Copied!')
                                .success()
                                .body(this.dataset.url)
                                .send();
                        }); return false;"
                    ]),

                ViewAction::make()
                    ->label('Analytics'),

                EditAction::make()
                    ->form([
                        TextInput::make('link_name')
                            ->label('Campaign Name')
                            ->required()
                            ->maxLength(200),

                        Textarea::make('description')
                            ->label('Description')
                            ->maxLength(500)
                            ->rows(3),

                        Toggle::make('status')
                            ->label('Active')
                            ->default(true),
                    ]),

                DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Delete Tracking Link')
                    ->modalDescription('Are you sure? This cannot be undone.')
                    ->disabled(fn($record) => $record->bookings_count > 0)
                    ->tooltip(fn($record) => $record->bookings_count > 0 ? 'Cannot delete links with bookings' : 'Delete link'),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Generate New Link')
                    ->icon('heroicon-o-plus')
                    ->modalHeading('Generate New Tracking Link')
                    ->modalDescription('Create a new tracking link to monitor bookings from different traffic sources')
                    ->modalWidth('2xl')
                    ->form([
                        TextInput::make('link_name')
                            ->label('Campaign Name')
                            ->required()
                            ->maxLength(200)
                            ->placeholder('e.g., Google Ads Campaign, Instagram Post')
                            ->helperText('Give this link a descriptive name to identify the traffic source')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                // Auto-generate link code if not manually set
                                if (empty($get('link_code')) && !empty($state)) {
                                    $set('link_code', RoomTrackingLink::generateUniqueCode($state));
                                }
                            })
                            ->columnSpanFull(),

                        Select::make('room_group_id')
                            ->label('Room Type')
                            ->options(RoomGroup::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->nullable()
                            ->placeholder('All Rooms')
                            ->helperText('Leave empty to track bookings for all room types'),

                        TextInput::make('link_code')
                            ->label('Link Code')
                            ->required()
                            ->maxLength(100)
                            ->unique(RoomTrackingLink::class, 'link_code')
                            ->placeholder('auto-generated-code')
                            ->helperText('This will be used in the URL. Auto-generated from campaign name.')
                            ->disabled()
                            ->dehydrated(),

                        Textarea::make('description')
                            ->label('Description')
                            ->maxLength(500)
                            ->rows(3)
                            ->placeholder('Optional notes about this tracking link...')
                            ->columnSpanFull(),

                        Toggle::make('status')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Inactive links will not track new clicks or bookings')
                            ->inline(false)
                            ->columnSpanFull(),
                    ])
                    ->mutateFormDataUsing(function (array $data): array {
                        // Add user_id and generate full_url
                        $data['user_id'] = Auth::id();
                        $data['full_url'] = url('/booking?ref=' . $data['link_code']);

                        // Initialize tracking fields
                        $data['clicks'] = 0;
                        $data['unique_clicks'] = 0;
                        $data['bookings_count'] = 0;
                        $data['total_nights_booked'] = 0;
                        $data['revenue_generated'] = 0.00;

                        return $data;
                    })
                    ->successNotification(null)
                    ->after(function ($record) {
                        Notification::make()
                            ->success()
                            ->title('Link Generated!')
                            ->body('URL: ' . $record->full_url)
                            ->send();
                    }),
            ])
            ->emptyStateHeading('No Tracking Links Yet')
            ->emptyStateDescription('Generate your first tracking link to start monitoring traffic sources and bookings.')
            ->emptyStateIcon('heroicon-o-link')
            ->emptyStateActions([
                CreateAction::make()
                    ->label('Generate First Link')
                    ->icon('heroicon-o-plus')
                    ->modalHeading('Generate New Tracking Link')
                    ->modalDescription('Create a new tracking link to monitor bookings from different traffic sources')
                    ->modalWidth('2xl')
                    ->form([
                        TextInput::make('link_name')
                            ->label('Campaign Name')
                            ->required()
                            ->maxLength(200)
                            ->placeholder('e.g., Google Ads Campaign, Instagram Post')
                            ->helperText('Give this link a descriptive name to identify the traffic source')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set, $get) {
                                // Auto-generate link code if not manually set
                                if (empty($get('link_code')) && !empty($state)) {
                                    $set('link_code', RoomTrackingLink::generateUniqueCode($state));
                                }
                            })
                            ->columnSpanFull(),

                        Select::make('room_group_id')
                            ->label('Room Type')
                            ->options(RoomGroup::pluck('name', 'id')->toArray())
                            ->searchable()
                            ->nullable()
                            ->placeholder('All Rooms')
                            ->helperText('Leave empty to track bookings for all room types'),

                        TextInput::make('link_code')
                            ->label('Link Code')
                            ->required()
                            ->maxLength(100)
                            ->unique(RoomTrackingLink::class, 'link_code')
                            ->placeholder('auto-generated-code')
                            ->helperText('This will be used in the URL. Auto-generated from campaign name.')
                            ->disabled()
                            ->dehydrated(),

                        Textarea::make('description')
                            ->label('Description')
                            ->maxLength(500)
                            ->rows(3)
                            ->placeholder('Optional notes about this tracking link...')
                            ->columnSpanFull(),

                        Toggle::make('status')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Inactive links will not track new clicks or bookings')
                            ->inline(false)
                            ->columnSpanFull(),
                    ])
                    ->mutateFormDataUsing(function (array $data): array {
                        // Add user_id and generate full_url
                        $data['user_id'] = Auth::id();
                        $data['full_url'] = url('/booking?ref=' . $data['link_code']);

                        // Initialize tracking fields
                        $data['clicks'] = 0;
                        $data['unique_clicks'] = 0;
                        $data['bookings_count'] = 0;
                        $data['total_nights_booked'] = 0;
                        $data['revenue_generated'] = 0.00;

                        return $data;
                    })
                    ->successNotification(null)
                    ->after(function ($record) {
                        Notification::make()
                            ->success()
                            ->title('Link Generated!')
                            ->body('URL: ' . $record->full_url)
                            ->send();
                    }),
            ]);
    }
}
