<x-mail::message>
{{-- Header Resmi ala NCU --}}
<div style="border-bottom: 2px solid #111; padding-bottom: 15px; margin-bottom: 30px;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="80" style="vertical-align: top;">
                @if($sekolah?->logo)
                    <img src="{{ asset('storage/' . $sekolah->logo) }}" width="80" alt="Logo">
                @else
                    <img src="{{ asset('images/logo.png') }}" width="80" alt="Logo">
                @endif
            </td>
            <td style="padding-left: 20px; vertical-align: middle;">
                <h1 style="margin: 0; font-family: 'Helvetica', Arial, sans-serif; font-size: 20px; color: #111; text-transform: uppercase; letter-spacing: 1px;">
                    {{ $sekolah?->nama ?? config('app.name') }}
                </h1>
                <p style="margin: 5px 0 0 0; font-size: 11px; color: #666; text-transform: uppercase; letter-spacing: 1px;">
                    Panitia Penerimaan Peserta Didik Baru (PPDB)
                </p>
            </td>
        </tr>
    </table>
</div>

<div style="font-family: 'Courier New', Courier, monospace; font-size: 14px; margin-bottom: 25px;">
    Student: <span style="font-weight: bold;">{{ $record->nama_lengkap }}</span>
</div>

<div style="text-align: center; margin-bottom: 30px;">
    <h2 style="font-family: 'Helvetica', Arial, sans-serif; font-size: 18px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin: 0;">
        INFORMASI HASIL SELEKSI PPDB
    </h2>
</div>

**Kepada Calon Siswa:** Kami berterima kasih atas partisipasi Anda dalam proses seleksi pendaftaran siswa baru di {{ $sekolah?->nama ?? 'sekolah kami' }}.

Setelah meninjau seluruh dokumen pendaftaran dan mempertimbangkan kuota yang tersedia, kami menginformasikan bahwa pendaftaran Anda saat ini **BELUM DAPAT DITERIMA** untuk tahun ajaran {{ now()->format('Y') }}/{{ now()->addYear()->format('Y') }}.

Keputusan ini bersifat final dan didasarkan pada peringkat seleksi akademik serta keterbatasan daya tampung kelas. Kami menghargai usaha yang telah Anda tunjukkan dan mendoakan kesuksesan untuk kelanjutan studi Anda di institusi pendidikan lainnya.

<div style="margin-top: 50px; border-top: 1px solid #eee; padding-top: 20px;">
    <table width="100%">
        <tr>
            <td style="font-size: 12px; color: #666;">
                Tanggal Terbit: {{ now()->translatedFormat('d F Y') }}<br>
                Panitia Seleksi PPDB
            </td>
            <td style="text-align: right; vertical-align: bottom;">
                <x-mail::button :url="config('app.url')">
                    Halaman Utama
                </x-mail::button>
            </td>
        </tr>
    </table>
</div>

<div style="margin-top: 30px; background-color: #f9fafb; border: 1px solid #e5e7eb; padding: 15px; font-size: 11px; color: #999;">
    <strong>Academic Records Office:</strong><br>
    Your application record will be stored in our database for the current academic cycle and will be purged thereafter.
</div>
</x-mail::message>
