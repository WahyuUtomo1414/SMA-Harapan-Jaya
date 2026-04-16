<x-mail::message>
<div style="text-align: right; font-family: 'Inter', sans-serif; font-size: 12px; color: #666; margin-bottom: 20px;">
    <strong>{{ $sekolah?->nama ?? config('app.name') }}</strong><br>
    {{ $sekolah?->email ?? 'info@sma-harapanjaya.sch.id' }}<br>
    Jakarta, {{ now()->translatedFormat('d F Y') }}
</div>

<div style="text-align: center; margin-bottom: 40px;">
    <h1 style="font-family: 'Playfair Display', serif; color: #111; font-size: 24px; text-transform: uppercase; letter-spacing: 2px; border-bottom: 2px solid #111; display: inline-block; padding-bottom: 10px;">
        Informasi Hasil Seleksi PPDB
    </h1>
</div>

Yth. **{{ $record->nama_lengkap }}**,

Dengan hormat,

Terima kasih atas minat dan kepercayaan yang Anda berikan dengan mendaftarkan diri pada program Penerimaan Peserta Didik Baru (PPDB) di SMA Harapan Jaya.

Kami informasikan bahwa panitia seleksi telah melakukan peninjauan secara menyeluruh terhadap seluruh dokumen dan hasil seleksi yang telah dilaksanakan. Melalui surat ini, dengan berat hati kami sampaikan bahwa untuk saat ini:

<div style="text-align: center; margin: 30px 0; padding: 20px; border: 1px solid #e5e7eb; background-color: #f9fafb;">
    <span style="font-size: 16px; font-weight: bold; color: #dc2626; text-transform: uppercase;">Pendaftaran Belum Dapat Diterima</span>
</div>

Keputusan ini diambil mengingat terbatasnya kuota daya tampung siswa dan tingginya standar kompetisi pada tahun ajaran ini. Kami sangat menghargai potensi yang Anda miliki dan mendoakan kesuksesan untuk perjalanan pendidikan Anda di institusi lainnya.

Demikian informasi ini kami sampaikan. Atas perhatian Anda, kami ucapkan terima kasih.

Hormat kami,

**Panitia PPDB**<br>
{{ $sekolah?->nama ?? config('app.name') }}

<x-mail::button :url="config('app.url')">
Kembali ke Beranda
</x-mail::button>
</x-mail::message>
