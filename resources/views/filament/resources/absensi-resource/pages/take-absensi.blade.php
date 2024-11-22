<x-filament-panels::page>
    <div>
        <x-filament-forms::field-wrapper class="pb-4">
            <x-filament-forms::field-wrapper.label for="jadwal">
                Pilih Jadwal
            </x-filament-forms::field-wrapper.label>
            <x-filament::input.wrapper>
                <x-filament::input.select wire:model="id_jadwal" id="jadwal">
                    <option value="">-- Pilih Jadwal --</option>
                    @foreach($jadwal as $jdwl)
                        <option value="{{ $jdwl->id_jadwal }}">
                            {{ $jdwl->mataPelajaran->nama_mapel . " " . $jdwl->kelas->nama_kelas  }} -
                            {{ $jdwl->hari }} ( {{ $jdwl->jam_mulai . " sampai " . $jdwl->jam_selesai }} )
                        </option>
                    @endforeach
                </x-filament::input.select>
            </x-filament::input.wrapper>
        </x-filament-forms::field-wrapper>
        <x-filament::button wire:click="pilihAbsen">Cari Absensi</x-filament::button>
        <x-filament::button wire:click="simpanAbsensi">Simpan Absensi</x-filament::button>

    </div>
    <x-filament-tables::container>
        <x-filament-tables::table>
            <thead>
            <x-filament-tables::row>
                <x-filament-tables::header-cell>
                    No
                </x-filament-tables::header-cell>
                <x-filament-tables::header-cell>
                    Nama Siswa
                </x-filament-tables::header-cell>
                <x-filament-tables::header-cell>Status</x-filament-tables::header-cell>
            </x-filament-tables::row>
            </thead>
            <tbody>
            @foreach($data as $index => $item)
                <x-filament-tables::row>
                    <x-filament-tables::header-cell>
                        {{ $index+1 }}
                    </x-filament-tables::header-cell>
                    <x-filament-tables::cell>
                        {{ $item->nama_lengkap }}
                    </x-filament-tables::cell>
                    <x-filament-tables::cell>
                        <x-filament::input.select wire:model="status.{{ $item->id_siswa }}">
                            <option value="hadir">Hadir</option>
                            <option value="alpha">Alpha</option>
                            <option value="izin">Izin</option>
                        </x-filament::input.select>
                    </x-filament-tables::cell>
                </x-filament-tables::row>
            @endforeach
            </tbody>
        </x-filament-tables::table>
    </x-filament-tables::container>


</x-filament-panels::page>
