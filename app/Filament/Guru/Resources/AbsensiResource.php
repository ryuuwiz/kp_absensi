<?php

namespace App\Filament\Guru\Resources;

use App\Exports\AbsensiExport;
use App\Filament\Guru\Resources\AbsensiResource\Pages;
use App\Models\Absensi;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = 'absensi';
    protected static ?string $navigationLabel = 'Absensi';
    protected static ?string $modelLabel = 'Absensi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.nama_lengkap')
                    ->label('Nama Siswa')
                    ->sortable(),
                TextColumn::make('jadwal.kelas.nama_kelas')
                    ->label('Kelas')
                    ->sortable(),
                TextColumn::make('jadwal.mataPelajaran.nama_mapel')
                    ->label('Mata Pelajaran')
                    ->sortable(),
                TextColumn::make('jadwal.tanggal')
                    ->label('Tanggal')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('jadwal.kelas.nama_kelas')
                    ->label('Kelas')
                    ->relationship('jadwal.kelas', 'nama_kelas'),
                SelectFilter::make('jadwal.mataPelajaran.nama_mapel')
                    ->label('Mata Pelajaran')
                    ->relationship('jadwal.mataPelajaran', 'nama_mapel'),
                Filter::make('jadwal.tanggal')
                    ->form([
                        DatePicker::make('Tanggal Mulai'),
                        DatePicker::make('Tanggal Selesai')
                            ->default(now()),
                    ]),
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'Hadir' => 'Hadir',
                        'Tidak Hadir' => 'Tidak Hadir',
                        'Izin' => 'Izin',
                        // Add other statuses as needed
                    ]),
            ], layout: FiltersLayout::AboveContent)
            ->actions([])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
                Tables\Actions\BulkAction::make('export')
                    ->label('Rekap Absensi')
                    ->icon('heroicon-o-document-arrow-down')
                    ->action(function (Collection $records) {
                        return Excel::download(new AbsensiExport($records), "absensi.xlsx");
                    }),
            ]);
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
            'index' => Pages\ListAbsensi::route('/'),
            'form-absensi' => Pages\FormAbsensi::route('/form-absensi'),
        ];
    }
}
