<x-mail::message>
<div style="text-align: right; font-family: 'Inter', sans-serif; font-size: 12px; color: #666; margin-bottom: 20px;">
    <strong>{{ $sekolah?->nama ?? config('app.name') }}</strong><br>
    {{ $sekolah?->email ?? 'info@sma-harapanjaya.sch.id' }}<br>
    Jakarta, {{ now()->translatedFormat('d F Y') }}
</div>

<div style="text-align: center; margin-bottom: 40px;">
    <h1 style="font-family: 'Playfair Display', serif; color: #111; font-size: 24px; text-transform: uppercase; letter-spacing: 2px; border-bottom: 2px solid #111; display: inline-block; padding-bottom: 10px;">
        Surat Penerimaan Siswa Baru
    </h1>
</div>

Yth. **{{ $record->nama_lengkap }}**,

Dengan hormat,

Sehubungan dengan proses seleksi Penerimaan Peserta Didik Baru (PPDB) yang telah dilaksanakan, melalui surat resmi ini kami sampaikan bahwa Anda:

<div style="text-align: center; margin: 30px 0; padding: 20px; border: 1px solid #e5e7eb; background-color: #f9fafb;">
    <span style="font-size: 18px; font-weight: bold; color: #008542; text-transform: uppercase;">Dinyatakan Diterima</span><br>
    <span style="font-size: 14px; color: #4b5563;">Sebagai Siswa Baru SMA Harapan Jaya</span>
</div>

**Instruksi Selanjutnya:**
Untuk menyelesaikan proses pendaftaran, Anda diwajibkan melakukan daftar ulang dengan memperhatikan ketentuan berikut:
1. Melampirkan fotokopi Ijazah/SKL dan Akte Kelahiran asli.
2. Membawa Kartu Keluarga asli untuk verifikasi data.
3. Melakukan pengisian formulir biodata tambahan di kantor tata usaha.

Proses daftar ulang dapat dilakukan setiap hari kerja (Senin - Jumat) pukul 08.00 - 15.00 WIB.

Demikian surat pemberitahuan ini kami sampaikan. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih. Kami menantikan kehadiran Anda sebagai bagian dari keluarga besar SMA Harapan Jaya.

Hormat kami,

**Panitia PPDB**<br>
{{ $sekolah?->nama ?? config('app.name') }}

<x-mail::button :url="config('app.url')">
Kunjungi Website Sekolah
</x-mail::button>
</x-mail::message>
