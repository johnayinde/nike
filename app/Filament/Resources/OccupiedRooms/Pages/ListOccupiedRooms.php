<?php

namespace App\Filament\Resources\OccupiedRooms\Pages;

use App\Filament\Resources\OccupiedRooms\OccupiedRoomsResource;
use Filament\Resources\Pages\ListRecords;

class ListOccupiedRooms extends ListRecords
{
    protected static string $resource = OccupiedRoomsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No header actions needed since this is a view-only resource
        ];
    }

    public function getTitle(): string
    {
        return 'Occupied Rooms';
    }

    protected function getHeaderWidgets(): array
    {
        return [
            // Add any widgets if needed
        ];
    }
}