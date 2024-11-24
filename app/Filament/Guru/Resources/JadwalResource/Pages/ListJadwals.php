<?php

namespace App\Filament\Guru\Resources\JadwalResource\Pages;

use App\Filament\Guru\Resources\JadwalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJadwals extends ListRecords
{
    protected static string $resource = JadwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
