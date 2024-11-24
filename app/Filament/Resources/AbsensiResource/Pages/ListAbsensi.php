<?php

namespace App\Filament\Resources\AbsensiResource\Pages;

use App\Filament\Resources\AbsensiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAbsensi extends ListRecords
{
    protected static string $resource = AbsensiResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\Action::make('absensi')
//                ->label('Absensi')
//                ->action(fn() => redirect(FormAbsensi::getUrl()))
        ];
    }
}
