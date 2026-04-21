<x-mail::message>
    <div style="border-bottom: 2px solid #111; padding-bottom: 15px; margin-bottom: 30px;">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="80" style="vertical-align: top;">
                    @if ($sekolah?->logo)
                        <img src="{{ asset('storage/' . $sekolah->logo) }}" width="80" alt="Lambang Sekolah">
                    @else
                        <img src="{{ asset('images/logo.png') }}" width="80" alt="Lambang Sekolah">
                    @endif
                </td>
                <td style="padding-left: 20px; vertical-align: middle;">
                    <h1
                        style="margin: 0; font-family: Arial, sans-serif; font-size: 20px; color: #111; text-transform: uppercase; letter-spacing: 1px;">
                        {{ $sekolah?->nama ?? config('app.name') }}
                    </h1>
                    <p
                        style="margin: 5px 0 0 0; font-size: 11px; color: #666; text-transform: uppercase; letter-spacing: 1px;">
                        Panitia Penerimaan Peserta Didik Baru (PPDB)
                    </p>
                </td>
            </tr>
        </table>
    </div>

    <div style="font-family: Arial, sans-serif; font-size: 14px; margin-bottom: 25px;">
        Kepada Yth.<br>
        Calon Peserta Didik: <strong>{{ $record->nama_lengkap }}</strong>
    </div>

    <div style="text-align: center; margin-bottom: 30px;">
        <h2
            style="font-family: Arial, sans-serif; font-size: 18px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin: 0;">
            Informasi Hasil Seleksi PPDB
        </h2>
    </div>

    Dengan hormat,

    Terima kasih atas partisipasi Anda dalam proses Penerimaan Peserta Didik Baru di
    {{ $sekolah?->nama ?? 'sekolah kami' }}.

    Setelah panitia meninjau dokumen pendaftaran, hasil seleksi, dan kuota penerimaan yang tersedia, kami menyampaikan
    bahwa pendaftaran atas nama **{{ $record->nama_lengkap }}** saat ini **BELUM DAPAT DITERIMA** untuk tahun ajaran
    {{ now()->format('Y') }}/{{ now()->addYear()->format('Y') }}.

    Keputusan ini dibuat berdasarkan hasil seleksi dan daya tampung kelas. Kami menghargai usaha yang telah dilakukan
    selama proses pendaftaran dan mendoakan kelancaran untuk pendidikan Anda selanjutnya.

    <div style="margin-top: 40px; border-top: 1px solid #eee; padding-top: 20px;">
        <table width="100%">
            <tr>
                <td style="font-size: 12px; color: #666;">
                    Tanggal terbit: {{ now()->translatedFormat('d F Y') }}<br>
                    Panitia PPDB {{ $sekolah?->nama ?? config('app.name') }}
                </td>
                <td style="text-align: right; vertical-align: bottom;">
                    <x-mail::button :url="config('app.url')">
                        Buka Halaman Utama
                    </x-mail::button>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="margin-top: 30px; background-color: #f9fafb; border: 1px solid #e5e7eb; padding: 15px; font-size: 11px; color: #666;">
        <strong>Catatan:</strong><br>
        Data pendaftaran akan disimpan oleh sekolah sesuai kebutuhan administrasi PPDB tahun berjalan.
    </div>
</x-mail::message>
