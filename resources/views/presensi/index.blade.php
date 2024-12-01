<x-layout>
    <x-slot:judul>{{ $judul }}</x-slot>

    @if (session('error'))
        <div class="alert alert-error shadow-lg flex justify-between my-5">
            <div>
                <span>{{ session('error') }}</span>
            </div>
            <button class="btn btn-ghost btn-sm ml-2" onclick="this.closest('.alert').remove();">×</button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success shadow-lg flex justify-between my-5">
            <div>
                <span>{{ session('success') }}</span>
            </div>
            <button class="btn btn-ghost btn-sm ml-2 text-2xl" onclick="this.closest('.alert').remove();">×</button>
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg p-5 ">
        <div class="grid  grid-rows-2 sm:grid-cols-3 sm:grid-rows-1">
            <div>
                <a href="{{ route('presensi.absen') }}"
                    class="w-80 h-80 mx-auto my-auto shadow-lg  bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full flex items-center justify-center text-4xl">
                    PRESENSI
                </a>
            </div>
            <div class="sm:col-span-2 mx-auto text-center">
                <h2 class="text-center font-extrabold text-2xl sm:text-4xl">Jadwal Hari ini </h2>

                @forelse($jadwalGuru as $jadwal)
                    <div class="stats stats-vertical lg:stats-horizontal shadow-lg my-3 mx-auto">
                        <div class="stat">
                            <div class="stat-title">Hari</div>
                            <div class="stat-value">{{ ucwords($jadwal->hari) }}</div>
                            <div class="stat-desc">{{ date('H:i', strtotime($jadwal->jam_mulai)) }} -
                                {{ date('H:i', strtotime($jadwal->jam_selesai)) }}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-title">Kelas</div>
                            <div class="stat-value text-md">{{ $jadwal->kelas->nama_kelas }}</div>
                        </div>

                        <div class="stat">
                            <div class="stat-title">Level</div>
                            <div class="stat-value">{{ $jadwal->level->nama_level }}</div>

                        </div>
                    </div>
                @empty
                    <h1 class="mt-4 text-xl font-bold">JADWAL KOSONG</h1>
                @endforelse
            </div>
        </div>
        <div class="mt-10">
            <div class="mx-auto text-center text-3xl font-bold my-3">
                Riwayat Presensi
            </div>
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full border-2 border-gray-300">

                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-l border-r text-xl">Hari</th>
                            <th class="px-4 py-2 border-b border-l border-r text-xl">Kelas</th>
                            <th class="px-4 py-2 border-b border-l border-r text-xl">Jam Check-In</th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($riwayatPresensi as $item)
                            <tr>
                                {{-- <td class="px-4 py-2 border-t">{{ $item->id }}</td> --}}

                                <td class="px-4 py-2 border-t text-lg">{{ ucwords($item->jadwal->hari) }}</td>
                                <td class="px-4 py-2 border-t text-lg">{{ $item->jadwal->kelas->nama_kelas }}</td>
                                <td class="px-4 py-2 border-t text-lg">
                                    {{ \Carbon\Carbon::parse($item->waktu_checkin)->translatedFormat('d F Y H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="italic font-bold text-center text-2xl"> Belum ada data ! </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-layout>
