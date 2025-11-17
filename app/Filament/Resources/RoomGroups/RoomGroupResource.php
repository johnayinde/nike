<?php

namespace App\Filament\Resources\RoomGroups;

use App\Filament\Resources\RoomGroups\Pages;
use App\Filament\Resources\RoomGroups\Tables\RoomGroupsTable;
use App\Models\RoomGroup;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RoomGroupResource extends Resource
{
    protected static ?string $model = RoomGroup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $navigationLabel = 'Room Groups';

    protected static string|UnitEnum|null $navigationGroup = 'Room Management';

    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return RoomGroupsTable::make($table);
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
            'index' => Pages\ListRoomGroups::route('/'),
        ];
    }

    // Disable creation, editing and deletion for this resource
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