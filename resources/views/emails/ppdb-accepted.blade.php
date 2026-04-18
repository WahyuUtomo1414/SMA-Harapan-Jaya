<x-mail::message>
    {{-- Header Resmi ala NCU --}}
    <div style="border-bottom: 2px solid #111; padding-bottom: 15px; margin-bottom: 30px;">
        <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="80" style="vertical-align: top;">
                    @if ($sekolah?->logo)
                        <img src="{{ asset('storage/' . $sekolah->logo) }}" width="80" alt="Logo">
                    @else
                        <img src="{{ asset('images/logo.png') }}" width="80" alt="Logo">
                    @endif
                </td>
                <td style="padding-left: 20px; vertical-align: middle;">
                    <h1
                        style="margin: 0; font-family: 'Helvetica', Arial, sans-serif; font-size: 20px; color: #111; text-transform: uppercase; letter-spacing: 1px;">
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

    <div style="font-family: 'Courier New', Courier, monospace; font-size: 14px; margin-bottom: 25px;">
        Siswa/Siswi: <span style="font-weight: bold;">{{ $record->nama_lengkap }}</span>
    </div>

    <div style="text-align: center; margin-bottom: 30px;">
        <h2
            style="font-family: 'Helvetica', Arial, sans-serif; font-size: 18px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin: 0;">
            SURAT PENERIMAAN SISWA BARU
        </h2>
    </div>

    **Berdasarkan hasil seleksi berkas dan tes akademik:** melalui surat resmi ini, panitia PPDB
    {{ $sekolah?->nama ?? 'sekolah' }} menyatakan bahwa Anda telah memenuhi kriteria dan **DITERIMA** sebagai siswa baru
    untuk tahun ajaran {{ now()->format('Y') }}/{{ now()->addYear()->format('Y') }}.

    **Instruksi Daftar Ulang:** Anda diwajibkan untuk mengikuti prosedur pendaftaran kembali sebagai berikut:
    * **Melengkapi Berkas:** Membawa dokumen asli (Akte, KK, Ijazah/SKL) untuk verifikasi di lokasi.
    * **Waktu Kehadiran:** Datang ke kantor Tata Usaha pada hari kerja pukul 08.00 - 15.00 WIB.
    * **Batas Waktu:** Daftar ulang paling lambat dilaksanakan 7 hari setelah surat ini dikirim.

    <div
        style="border: 1px solid #111; padding: 10px; margin: 25px 0; text-align: center; font-family: 'Courier New', Courier, monospace; font-weight: bold;">
        NOMOR REGISTRASI: PPDB-{{ $record->id }}-{{ now()->format('Y') }}
    </div>

    **Integritas Akademik:** Seluruh data yang dikirimkan harus merupakan data asli. Jika ditemukan ketidaksesuaian data
    di kemudian hari, maka status penerimaan ini dapat dibatalkan secara sepihak oleh sekolah.

    <div style="margin-top: 50px; border-top: 1px solid #eee; padding-top: 20px;">
        <table width="100%">
            <tr>
                <td style="font-size: 12px; color: #666;">
                    Tanggal Terbit: {{ now()->translatedFormat('d F Y') }}<br>
                    Admin: Panitia PPDB
                </td>
                <td style="text-align: right; vertical-align: bottom;">
                    <x-mail::button :url="config('app.url')">
                        Konfirmasi via Website
                    </x-mail::button>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="margin-top: 30px; background-color: #fdf9e9; border: 1px solid #e5e7eb; padding: 15px; font-size: 11px;">
        <strong>Catatan Petugas (Faculty Use Only):</strong><br>
        <br>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="border-bottom: 1px solid #ccc; padding-bottom: 5px;">Verifier Name:</td>
                <td style="border-bottom: 1px solid #ccc; padding-bottom: 5px;">Status: VERIFIED</td>
                <td style="border-bottom: 1px solid #ccc; padding-bottom: 5px;">Date: __________</td>
            </tr>
        </table>
    </div>
</x-mail::message>
