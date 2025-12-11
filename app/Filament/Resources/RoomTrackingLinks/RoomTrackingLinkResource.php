<?php

namespace App\Filament\Resources\RoomTrackingLinks;

use App\Filament\Resources\RoomTrackingLinks\Pages\ListRoomTrackingLinks;
use App\Filament\Resources\RoomTrackingLinks\Pages\ViewRoomTrackingLink;
use App\Filament\Resources\RoomTrackingLinks\Schemas\RoomTrackingLinkForm;
use App\Filament\Resources\RoomTrackingLinks\Tables\RoomTrackingLinksTable;
use App\Models\RoomTrackingLink;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RoomTrackingLinkResource extends Resource
{
    protected static ?string $model = RoomTrackingLink::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedLink;

    protected static ?string $navigationLabel = 'Tracking Links';

    protected static ?string $modelLabel = 'Tracking Link';

    protected static ?string $pluralModelLabel = 'Tracking Links';

    protected static string|UnitEnum|null $navigationGroup = 'Reservation Management';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return RoomTrackingLinkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RoomTrackingLinksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRoomTrackingLinks::route('/'),
            'view' => ViewRoomTrackingLink::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return true;
    }

    public static function canEdit($record): bool
    {
        return true;
    }

    public static function canDelete($record): bool
    {
        // Can only delete if no bookings
        return $record->bookings_count == 0;
    }
}
