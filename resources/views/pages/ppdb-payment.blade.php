@extends('layouts.app')

@section('title', 'Pembayaran PPDB | SMA Harapan Jaya')

@section('content')

{{-- ─── Header ────────────────────────────────────────────────────── --}}
<section class="relative border-b border-gray-200 bg-white">
    <div class="absolute top-0 left-0 w-full h-[6px] bg-primary"></div>
    <div class="max-w-4xl mx-auto px-6 py-16 text-center">
        <span class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-6">
            Tahap 2
        </span>
        <h1 class="text-on-surface text-4xl md:text-5xl font-headline font-normal leading-tight mb-4 tracking-tight">
            Upload Bukti <span class="italic text-primary">Pembayaran</span>
        </h1>
        <p class="text-gray-500 font-body text-base leading-relaxed max-w-xl mx-auto">
            Pendaftaran awal berhasil! Selesaikan tahap akhir dengan mentransfer biaya pendaftaran ke salah satu rekening resmi sekolah, lalu unggah buktinya.
        </p>
    </div>
</section>

{{-- ─── Form ───────────────────────────────────────────────────────── --}}
<section class="max-w-4xl mx-auto px-6 py-14">

    {{-- Error messages --}}
    @if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 mb-8">
        <ul class="list-disc list-inside font-body text-sm space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('ppdb.payment.store') }}" enctype="multipart/form-data" class="space-y-10">
        @csrf

        {{-- ── Info Formulir & Rincian Pembayaran ─────────────────────── --}}
        <div class="border border-gray-200 bg-white">
            <div class="bg-gray-800 px-8 py-4 flex items-center justify-between">
                <h2 class="text-white font-headline text-lg font-medium tracking-tight">Rincian Pembayaran</h2>
                <span class="text-gray-300 font-subhead text-xs uppercase tracking-widest">{{ now()->translatedFormat('d F Y') }}</span>
            </div>
            <div class="px-8 py-5 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-10">
                <div>
                    <p class="text-xs font-subhead font-bold uppercase tracking-widest text-gray-500 mb-1">Nomor Formulir</p>
                    <p class="font-headline font-medium text-on-surface text-base">PPDB-{{ str_pad($formPpdb->id, 5, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div>
                    <p class="text-xs font-subhead font-bold uppercase tracking-widest text-gray-500 mb-1">Nama Pendaftar</p>
                    <p class="font-body text-on-surface text-base font-medium">{{ $formPpdb->nama_lengkap }}</p>
                </div>
                <div>
                    <p class="text-xs font-subhead font-bold uppercase tracking-widest text-gray-500 mb-1">Jurusan</p>
                    <p class="font-body text-on-surface text-base font-medium">{{ $formPpdb->jurusan }}</p>
                </div>
            </div>
            <div class="px-8 py-6">
                <table class="w-full border-collapse text-sm font-body">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-3 text-center font-subhead font-bold uppercase tracking-wider text-xs text-gray-600 w-12">No</th>
                            <th class="border border-gray-300 px-4 py-3 text-left font-subhead font-bold uppercase tracking-wider text-xs text-gray-600">Jenis Pembayaran</th>
                            <th class="border border-gray-300 px-4 py-3 text-right font-subhead font-bold uppercase tracking-wider text-xs text-gray-600">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rincianPembayaran as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border border-gray-300 px-4 py-3 text-center text-gray-600">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-3 text-on-surface">
                                <div>{{ $item->jenis }}</div>
                                @if($item->deskripsi)
                                    <div class="mt-1 text-xs text-gray-500">{{ $item->deskripsi }}</div>
                                @endif
                            </td>
                            <td class="border border-gray-300 px-4 py-3 text-right text-on-surface font-medium">Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="border border-gray-300 px-4 py-4 text-center text-gray-500">
                                Rincian pembayaran belum tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-50">
                            <td colspan="2" class="border border-gray-300 px-4 py-3 text-right font-subhead font-bold uppercase tracking-wider text-xs text-gray-700">Total Pembayaran</td>
                            <td class="border border-gray-300 px-4 py-3 text-right font-body font-bold text-on-surface text-base">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


        <div class="border border-gray-200 bg-white">
            <div class="bg-primary px-8 py-4">
                <h2 class="text-white font-headline text-lg font-medium tracking-tight">A. Pilih Rekening Tujuan</h2>
            </div>
            <div class="p-8 grid grid-cols-1 gap-8">
                
                <div>
                    <label for="rekening_id" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">Pilih Bank Pembayaran <span class="text-red-500">*</span></label>
                    <select id="rekening_select" onchange="updateRekeningDetails()"
                        class="w-full border @error('bukti_pembayaran') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-3 text-sm font-body text-on-surface focus:outline-none focus:border-primary transition bg-white appearance-none">
                        <option value="" selected disabled>-- Pilih Bank Tujuan Transaksi --</option>
                        @foreach($rekenings as $rek)
                            <option value="{{ $rek->id }}">{{ $rek->nama_bank }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Detail Rekening Card --}}
                <div id="rekening_details_card" class="bg-gray-50 border border-gray-200 p-6 hidden">
                    <div class="flex flex-col sm:flex-row items-start gap-4">
                        <div class="shrink-0 w-16 h-16 bg-white border border-gray-200 flex items-center justify-center p-2">
                            <svg class="w-8 h-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <div>
                            <p id="lbl_nama_bank" class="font-subhead text-xs font-bold uppercase tracking-wider text-gray-500"></p>
                            <div class="flex items-center gap-3 mt-1">
                                <p id="lbl_nomor_rekening" class="font-headline font-medium text-2xl text-on-surface tracking-tight"></p>
                                <button type="button" onclick="copyToClipboard()" class="text-primary hover:text-[#006b35] transition" title="Salin Nomor Rekening">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                </button>
                            </div>
                            <p class="font-body text-sm text-gray-600 mt-1">a.n. <span id="lbl_nama_pemilik" class="font-medium"></span></p>
                            <p id="lbl_deskripsi" class="font-body text-xs text-gray-500 mt-2 italic"></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- ── B. Upload Bukti Pembayaran ───────────────────────────── --}}
        <div id="upload_section" class="border border-gray-200 bg-white transition-opacity duration-300 opacity-50 pointer-events-none">
            <div class="bg-[#111] px-8 py-4">
                <h2 class="text-white font-headline text-lg font-medium tracking-tight">B. Upload Bukti</h2>
            </div>
            <div class="p-8">
                
                <div>
                    <label for="bukti_pembayaran" class="block text-xs font-subhead font-bold uppercase tracking-widest text-gray-600 mb-2">
                        Foto / Screenshot Bukti Transfer <span class="text-red-500">*</span>
                    </label>
                    <label for="bukti_pembayaran"
                        class="flex flex-col sm:flex-row items-center gap-4 border-2 border-dashed @error('bukti_pembayaran') border-red-400 bg-red-50 @else border-gray-300 hover:border-primary @enderror px-6 py-8 cursor-pointer transition group text-center sm:text-left">
                        <span class="shrink-0 w-12 h-12 flex items-center justify-center border border-gray-300 group-hover:border-primary bg-gray-50 transition rounded-full sm:rounded-none">
                            <svg class="w-6 h-6 text-gray-400 group-hover:text-primary transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                        </span>
                        <div class="flex-1 min-w-0">
                            <p id="bukti_pembayaran_name" class="font-body text-base text-gray-600 truncate">Klik untuk memilih file gambar</p>
                            <p class="text-xs text-gray-400 mt-1">Format: JPG, JPEG, PNG. Maksimal 2 MB.</p>
                        </div>
                        <input id="bukti_pembayaran" name="bukti_pembayaran" type="file"
                            accept=".jpg,.jpeg,.png" class="sr-only" required
                            onchange="document.getElementById('bukti_pembayaran_name').textContent = this.files[0]?.name ?? 'Klik untuk memilih file gambar'">
                    </label>
                    @error('bukti_pembayaran') <p class="mt-2 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

            </div>
        </div>

        {{-- ── Submit ───────────────────────────────────────────────── --}}
        <div id="submit_section" class="flex flex-col sm:flex-row items-center justify-end gap-4 pt-4 transition-opacity duration-300 opacity-50 pointer-events-none">
            <button type="submit"
                class="inline-flex items-center justify-center bg-primary text-white px-12 py-4 font-subhead uppercase tracking-[0.2em] text-xs transition hover:bg-[#006b35] w-full sm:w-auto">
                Kirim Pembayaran
            </button>
        </div>

    </form>
</section>

<script>
    const rekenings = @json($rekenings);

    function updateRekeningDetails() {
        const select = document.getElementById('rekening_select');
        const card = document.getElementById('rekening_details_card');
        const uploadSec = document.getElementById('upload_section');
        const submitSec = document.getElementById('submit_section');
        
        const selectedId = select.value;
        const data = rekenings.find(r => r.id == selectedId);

        if (data) {
            document.getElementById('lbl_nama_bank').textContent = data.nama_bank;
            document.getElementById('lbl_nomor_rekening').textContent = data.nomor_rekening;
            document.getElementById('lbl_nama_pemilik').textContent = data.nama_pemilik;
            document.getElementById('lbl_deskripsi').textContent = data.deskripsi || '';

            // Show details
            card.classList.remove('hidden');
            
            // Enable upload and submit
            uploadSec.classList.remove('opacity-50', 'pointer-events-none');
            submitSec.classList.remove('opacity-50', 'pointer-events-none');
        }
    }

    function copyToClipboard() {
        const norek = document.getElementById('lbl_nomor_rekening').textContent;
        navigator.clipboard.writeText(norek).then(() => {
            alert('Nomor Rekening berhasil disalin: ' + norek);
        });
    }
</script>

@endsection
