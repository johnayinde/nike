<?php

namespace App\Filament\Resources\RoomTrackingLinks\Pages;

use App\Filament\Resources\RoomTrackingLinks\RoomTrackingLinkResource;
use App\Filament\Resources\RoomTrackingLinks\Widgets\RoomTrackingLinksStats;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Pages\ListRecords;

class ListRoomTrackingLinks extends ListRecords
{
    use ExposesTableToWidgets;

    protected static string $resource = RoomTrackingLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            RoomTrackingLinksStats::class,
        ];
    }

    public function getTitle(): string
    {
        return 'Room Tracking Links';
    }

    public function getSubheading(): ?string
    {
        return 'Track bookings and revenue from different traffic sources';
    }
}
