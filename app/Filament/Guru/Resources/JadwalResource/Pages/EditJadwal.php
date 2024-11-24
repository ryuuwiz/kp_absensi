<?php

namespace App\Filament\Guru\Resources\JadwalResource\Pages;

use App\Filament\Guru\Resources\JadwalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwal extends EditRecord
{
    protected static string $resource = JadwalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
