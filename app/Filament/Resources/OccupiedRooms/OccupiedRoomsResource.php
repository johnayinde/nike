<?php

namespace App\Filament\Resources\OccupiedRooms;

use App\Filament\Resources\OccupiedRooms\Pages\ListOccupiedRooms;
use App\Filament\Resources\OccupiedRooms\Tables\OccupiedRoomsTable;
use App\Models\Booking;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class OccupiedRoomsResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $recordTitleAttribute = 'Occupied Room';

    protected static ?string $navigationLabel = 'Occupied Rooms';

    protected static ?string $pluralModelLabel = 'Occupied Rooms';

    protected static ?string $modelLabel = 'Occupied Room';

    protected static string|UnitEnum|null $navigationGroup = 'Reservation Management';

    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->where('order_status', 'Occupied')
            ->where(function ($query) {
                $query->whereRaw('LOWER(payment_status) = ?', ['paid'])
                      ->orWhereRaw('LOWER(payment_status) = ?', ['successful']);
            })
            ->orderBy('checkin', 'desc');
    }

    public static function form(Schema $schema): Schema
    {
        // No form needed for this resource as it's view-only
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return OccupiedRoomsTable::configure($table);
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
            'index' => ListOccupiedRooms::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }
}