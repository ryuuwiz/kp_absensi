<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Filament\Resources\SiswaResource;
use App\Imports\SiswaImport;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListSiswas extends ListRecords
{
    protected static string $resource = SiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('import_siswa')
            ->label('Import Siswa')
                ->color('success')
            ->icon('heroicon-o-document-arrow-up')
            ->form([
                FileUpload::make('attachment'),
            ])->action(function ($record, $data) {
                $file = public_path('storage/' . $data['attachment']);
//                dd($file);
                Excel::import(new SiswaImport, $file);

                Notification::make()
                    ->title('Berhasil Import Data Siswa')
                    ->success()
                    ->send();
                })
        ];
    }
}
