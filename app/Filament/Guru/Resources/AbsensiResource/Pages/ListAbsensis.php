<?php

namespace App\Filament\Guru\Resources\AbsensiResource\Pages;

use App\Filament\Guru\Resources\AbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbsensis extends ListRecords
{
    protected static string $resource = AbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
