<?php

namespace App\Filament\Resources\RoomTrackingLinks\Pages;

use App\Filament\Resources\RoomTrackingLinks\RoomTrackingLinkResource;
use App\Filament\Resources\RoomTrackingLinks\Widgets\TrackingLinkStatsWidget;
use App\Filament\Resources\RoomTrackingLinks\Widgets\RecentBookingsWidget;
use Filament\Actions\EditAction;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Resources\Pages\ViewRecord;

class ViewRoomTrackingLink extends ViewRecord
{
    protected static string $resource = RoomTrackingLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            TrackingLinkStatsWidget::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            RecentBookingsWidget::class,
        ];
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Link Information')
                    ->schema([
                        TextEntry::make('link_name')
                            ->label('Campaign Name'),

                        TextEntry::make('full_url')
                            ->label('Tracking URL')
                            ->copyable()
                            ->copyMessage('Link copied!')
                            ->copyMessageDuration(1500),

                        TextEntry::make('link_code')
                            ->label('Link Code')
                            ->badge()
                            ->color('gray'),

                        TextEntry::make('room_name')
                            ->label('Room Type')
                            ->badge()
                            ->color('info'),

                        TextEntry::make('description')
                            ->label('Description')
                            ->default('No description'),

                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->formatStateUsing(fn($state) => $state ? 'Active' : 'Inactive')
                            ->color(fn($state) => $state ? 'success' : 'danger'),

                        TextEntry::make('created_at')
                            ->label('Created')
                            ->dateTime('M d, Y h:i A'),
                    ])
                    ->columns(2),
            ]);
    }
}
