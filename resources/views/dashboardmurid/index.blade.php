<div class="p-6 bg-gray-100 min-h-screen">

    @if(!$murid)
        <div class="bg-red-100 text-red-600 p-4 rounded-lg shadow">
            Data murid belum tersedia
        </div>
    @else

    <!-- HEADER -->
    <div class="mb-6 bg-linear-to-r from-green-500 to-emerald-600 p-6 rounded-2xl shadow text-white">
        <h1 class="text-3xl font-bold">
            Halo, {{ $murid->nama }}
        </h1>
        <p class="text-green-100">
            Dashboard Siswa - Informasi Akademik & Kehadiran
        </p>
    </div>

    <!-- CARD -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

        <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-xl">📘</div>
            <div>
                <p class="text-gray-500 text-sm">Total Nilai</p>
                <h2 class="text-2xl font-bold">{{ $nilai->count() }}</h2>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4">
            <div class="bg-green-100 text-green-600 p-3 rounded-xl">📊</div>
            <div>
                <p class="text-gray-500 text-sm">Rata-rata</p>
                <h2 class="text-2xl font-bold">
                    {{ number_format($rataRata, 1) }}
                </h2>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4">
            <div class="bg-yellow-100 text-yellow-600 p-3 rounded-xl">✅</div>
            <div>
                <p class="text-gray-500 text-sm">Hadir</p>
                <h2 class="text-2xl font-bold">{{ $hadir }}</h2>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4">
            <div class="bg-red-100 text-red-600 p-3 rounded-xl">❌</div>
            <div>
                <p class="text-gray-500 text-sm">Alpha</p>
                <h2 class="text-2xl font-bold">{{ $alpha }}</h2>
            </div>
        </div>

    </div>

    <!-- NILAI -->
    <div class="bg-white p-5 rounded-2xl shadow mb-6">
        <h2 class="text-lg font-semibold mb-4">Data Nilai</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">Mapel</th>
                        <th class="p-3">Tugas</th>
                        <th class="p-3">UTS</th>
                        <th class="p-3">UAS</th>
                        <th class="p-3">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($nilai as $n)
                    <tr class="border-t">
                        <td class="p-3">{{ $n->mataPelajaran->nama ?? '-' }}</td>
                        <td class="p-3">{{ $n->tugas }}</td>
                        <td class="p-3">{{ $n->uts }}</td>
                        <td class="p-3">{{ $n->uas }}</td>
                        <td class="p-3 font-bold text-blue-600">
                            {{ $n->total_nilai }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center p-4 text-gray-400">
                            Belum ada nilai
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- ABSENSI (READ ONLY) -->
    <div class="bg-white p-5 rounded-2xl shadow mb-6">
        <h2 class="text-lg font-semibold mb-4">Riwayat Absensi</h2>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3">Tanggal</th>
                        <th class="p-3">Mapel</th>
                        <th class="p-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absensi as $a)
                    <tr class="border-t">
                        <td class="p-3">
                            {{ $a->absensi->tanggal ?? '-' }}
                        </td>
                        <td class="p-3">
                            {{ $a->absensi->jadwalPelajaran->mataPelajaran->nama ?? '-' }}
                        </td>
                        <td class="p-3 font-semibold">
                            {{ ucfirst($a->status) }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center p-4 text-gray-400">
                            Belum ada data absensi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- PEMBAYARAN (COMING SOON) -->
    <div class="bg-white p-5 rounded-2xl shadow">
        <h2 class="text-lg font-semibold mb-2">Pembayaran SPP</h2>

        <p class="text-gray-400">
            Fitur pembayaran belum tersedia
        </p>

        {{-- 
            TODO:
            - Tambah tabel pembayaran / spp
            - Relasi ke murid
            - Status: Lunas / Belum
        --}}
    </div>

    @endif

</div>