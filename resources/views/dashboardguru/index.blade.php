<div class="p-6 bg-gray-50 min-h-screen">

    @if(!$guru)
        <div class="bg-red-100 text-red-600 p-4 rounded-xl shadow">
            Data guru belum tersedia
        </div>
    @else

    <!-- HEADER -->
    <div class="mb-6 bg-linear-to-r from-blue-500 to-indigo-600 p-6 rounded-3xl shadow-lg text-white">
        <h1 class="text-3xl font-bold">
            Halo, {{ $guru->nama }}
        </h1>
        <p class="text-blue-100 text-sm">
            Dashboard Guru
        </p>
    </div>

    <!-- CARD (ABSENSI ONLY) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-6">

        <div class="bg-white p-5 rounded-3xl shadow flex items-center gap-4">
            <div class="bg-yellow-100 text-yellow-600 p-4 rounded-2xl text-xl">
                ✅
            </div>
            <div>
                <p class="text-gray-400 text-xs uppercase">Total Absensi</p>
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $totalAbsensi }}
                </h2>
            </div>
        </div>

        <div class="bg-white p-5 rounded-3xl shadow flex items-center gap-4">
            <div class="bg-blue-100 text-blue-600 p-4 rounded-2xl text-xl">
                📊
            </div>
            <div>
                <p class="text-gray-400 text-xs uppercase">Total Nilai</p>
                <h2 class="text-2xl font-bold text-gray-800">
                    {{ $totalNilai }}
                </h2>
            </div>
        </div>

    </div>

    <!-- STATISTIK NILAI -->
    <div class="bg-white p-6 rounded-3xl shadow mb-6">
        <h2 class="text-lg font-semibold mb-4">Statistik Nilai</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">

            <div class="bg-gray-50 p-4 rounded-xl">
                <p class="text-gray-400 text-xs">Rata-rata</p>
                <h3 class="text-xl font-bold text-green-600">
                    {{ number_format($rataNilai, 1) }}
                </h3>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl">
                <p class="text-gray-400 text-xs">Tertinggi</p>
                <h3 class="text-xl font-bold text-purple-600">
                    {{ $maxNilai }}
                </h3>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl">
                <p class="text-gray-400 text-xs">Terendah</p>
                <h3 class="text-xl font-bold text-red-600">
                    {{ $minNilai }}
                </h3>
            </div>

        </div>
    </div>

    <!-- TABLE JADWAL -->
    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <div class="p-5 border-b">
            <h2 class="text-lg font-semibold">Jadwal Mengajar</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase">
                    <tr>
                        <th class="px-5 py-3 text-left">Hari</th>
                        <th class="px-5 py-3 text-left">Kelas</th>
                        <th class="px-5 py-3 text-left">Mapel</th>
                        <th class="px-5 py-3 text-left">Jam</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($jadwal as $j)
                        <tr class="hover:bg-gray-50">
                            <td class="px-5 py-3">{{ $j->hari }}</td>
                            <td class="px-5 py-3">{{ $j->kelas->kode ?? '-' }}</td>
                            <td class="px-5 py-3">{{ $j->mataPelajaran->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-blue-600">
                                {{ $j->mulai }} - {{ $j->selesai }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6 text-gray-400">
                                Belum ada jadwal
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    @endif

</div>