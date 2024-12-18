<?php

namespace App\Filament\Resources;

use App\Exports\AbsensiExport;
use App\Filament\Resources\AbsensiResource\Pages;
use App\Models\Absensi;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiResource extends Resource
{
    protected static ?string $model = Absensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $slug = 'absensi';
    protected static ?string $navigationLabel = 'Riwayat Absensi';
    protected static ?string $modelLabel = 'Riwayat Absensi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    /**
     * @throws \Exception
     */
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
                        'hadir' => 'Hadir',
                        'alpha' => 'Alpha',
                        'izin' => 'Izin',
                    ]),
            ], layout: FiltersLayout::AboveContent)
            ->actions([])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
