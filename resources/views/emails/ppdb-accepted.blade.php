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
            Surat Penerimaan Peserta Didik Baru
        </h2>
    </div>

    Dengan hormat,

    Berdasarkan hasil seleksi administrasi dan penilaian panitia PPDB {{ $sekolah?->nama ?? 'sekolah' }}, kami
    menyampaikan bahwa calon peserta didik atas nama **{{ $record->nama_lengkap }}** dinyatakan **DITERIMA** sebagai
    peserta didik baru untuk tahun ajaran {{ now()->format('Y') }}/{{ now()->addYear()->format('Y') }}.

    Berikut ketentuan daftar ulang yang perlu diperhatikan:

    * **Verifikasi dokumen:** Membawa dokumen asli seperti Akta Kelahiran, Kartu Keluarga, Ijazah atau Surat Keterangan
    Lulus.
    * **Tempat daftar ulang:** Kantor Tata Usaha {{ $sekolah?->nama ?? 'sekolah' }}.
    * **Waktu pelayanan:** Hari kerja pukul 08.00 - 15.00 WIB.
    * **Batas waktu:** Paling lambat 7 hari setelah surel ini diterima.

    <div
        style="border: 1px solid #111; padding: 12px; margin: 25px 0; text-align: center; font-family: Arial, sans-serif; font-weight: bold;">
        NOMOR REGISTRASI: PPDB-{{ $record->id }}-{{ now()->format('Y') }}
    </div>

    Seluruh data dan dokumen yang diserahkan wajib sesuai dengan kondisi sebenarnya. Apabila di kemudian hari ditemukan
    ketidaksesuaian data, sekolah berhak meninjau kembali status penerimaan.

    <div style="margin-top: 40px; border-top: 1px solid #eee; padding-top: 20px;">
        <table width="100%">
            <tr>
                <td style="font-size: 12px; color: #666;">
                    Tanggal terbit: {{ now()->translatedFormat('d F Y') }}<br>
                    Panitia PPDB {{ $sekolah?->nama ?? config('app.name') }}
                </td>
                <td style="text-align: right; vertical-align: bottom;">
                    <x-mail::button :url="config('app.url')">
                        Buka Situs Sekolah
                    </x-mail::button>
                </td>
            </tr>
        </table>
    </div>

    <div
        style="margin-top: 30px; background-color: #fdf9e9; border: 1px solid #e5e7eb; padding: 15px; font-size: 11px;">
        <strong>Catatan untuk petugas:</strong><br><br>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="border-bottom: 1px solid #ccc; padding-bottom: 5px;">Nama verifikator: __________</td>
                <td style="border-bottom: 1px solid #ccc; padding-bottom: 5px;">Status: Terverifikasi</td>
                <td style="border-bottom: 1px solid #ccc; padding-bottom: 5px;">Tanggal: __________</td>
            </tr>
        </table>
    </div>
</x-mail::message>
