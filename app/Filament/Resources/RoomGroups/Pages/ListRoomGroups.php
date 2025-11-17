<?php

namespace App\Filament\Resources\RoomGroups\Pages;

use App\Filament\Resources\RoomGroups\RoomGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoomGroups extends ListRecords
{
    protected static string $resource = RoomGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // No header actions needed since we don't allow creation
        ];
    }
}