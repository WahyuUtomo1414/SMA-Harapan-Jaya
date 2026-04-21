<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Penerimaan Peserta Didik Baru</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #e0e0e0;">

                    {{-- Header Kop Surat --}}
                    <tr>
                        <td style="padding: 25px 35px 20px; border-bottom: 2px solid #111111;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="70" style="vertical-align: middle;">
                                        @if ($sekolah?->logo)
                                            <img src="{{ asset('storage/' . $sekolah->logo) }}" width="60" height="60" alt="Logo Sekolah" style="display: block;">
                                        @else
                                            <img src="{{ asset('images/logo.png') }}" width="60" height="60" alt="Logo Sekolah" style="display: block;">
                                        @endif
                                    </td>
                                    <td style="padding-left: 15px; vertical-align: middle;">
                                        <p style="margin: 0; font-size: 18px; font-weight: bold; color: #111111; text-transform: uppercase; letter-spacing: 1px;">
                                            {{ $sekolah?->nama ?? config('app.name') }}
                                        </p>
                                        <p style="margin: 4px 0 0 0; font-size: 11px; color: #666666; text-transform: uppercase; letter-spacing: 1px;">
                                            Panitia Penerimaan Peserta Didik Baru (PPDB)
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Judul Surat --}}
                    <tr>
                        <td style="padding: 25px 35px 10px; text-align: center;">
                            <p style="margin: 0; font-size: 16px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; color: #111111;">
                                SURAT PENERIMAAN PESERTA DIDIK BARU
                            </p>
                        </td>
                    </tr>

                    {{-- Sapaan --}}
                    <tr>
                        <td style="padding: 15px 35px 5px;">
                            <p style="margin: 0; font-size: 14px; color: #333333; line-height: 1.6;">
                                Kepada Yth.<br>
                                Calon Peserta Didik: <strong>{{ $record->nama_lengkap }}</strong>
                            </p>
                        </td>
                    </tr>

                    {{-- Isi Surat --}}
                    <tr>
                        <td style="padding: 15px 35px;">
                            <p style="font-size: 14px; color: #333333; line-height: 1.8; margin: 0 0 15px 0;">
                                Dengan hormat,
                            </p>
                            <p style="font-size: 14px; color: #333333; line-height: 1.8; margin: 0 0 15px 0;">
                                Berdasarkan hasil seleksi administrasi dan penilaian panitia PPDB
                                <strong>{{ $sekolah?->nama ?? 'SMA Harapan Jaya' }}</strong>, kami menyampaikan bahwa
                                calon peserta didik atas nama <strong>{{ $record->nama_lengkap }}</strong> dinyatakan
                                <strong style="color: #16a34a;">DITERIMA</strong> sebagai peserta didik baru untuk
                                tahun ajaran {{ now()->format('Y') }}/{{ now()->addYear()->format('Y') }}.
                            </p>
                        </td>
                    </tr>

                    {{-- Ketentuan Daftar Ulang --}}
                    <tr>
                        <td style="padding: 0 35px 15px;">
                            <p style="font-size: 14px; color: #333333; margin: 0 0 10px 0; font-weight: bold;">Ketentuan Daftar Ulang:</p>
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="20" style="vertical-align: top; font-size: 14px; color: #333; padding-top: 3px;">•</td>
                                    <td style="font-size: 14px; color: #333333; line-height: 1.7; padding-bottom: 6px;">
                                        <strong>Verifikasi dokumen:</strong> Membawa dokumen asli seperti Akta Kelahiran, Kartu Keluarga, dan Ijazah / SKL.
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20" style="vertical-align: top; font-size: 14px; color: #333; padding-top: 3px;">•</td>
                                    <td style="font-size: 14px; color: #333333; line-height: 1.7; padding-bottom: 6px;">
                                        <strong>Tempat daftar ulang:</strong> Kantor Tata Usaha {{ $sekolah?->nama ?? 'sekolah' }}.
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20" style="vertical-align: top; font-size: 14px; color: #333; padding-top: 3px;">•</td>
                                    <td style="font-size: 14px; color: #333333; line-height: 1.7; padding-bottom: 6px;">
                                        <strong>Waktu pelayanan:</strong> Hari kerja pukul 08.00 – 15.00 WIB.
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20" style="vertical-align: top; font-size: 14px; color: #333; padding-top: 3px;">•</td>
                                    <td style="font-size: 14px; color: #333333; line-height: 1.7; padding-bottom: 6px;">
                                        <strong>Batas waktu:</strong> Paling lambat 7 hari setelah surel ini diterima.
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Penutup --}}
                    <tr>
                        <td style="padding: 0 35px 25px;">
                            <p style="font-size: 13px; color: #666666; line-height: 1.7; margin: 0;">
                                Seluruh data dan dokumen yang diserahkan wajib sesuai dengan kondisi sebenarnya.
                                Apabila di kemudian hari ditemukan ketidaksesuaian data, sekolah berhak meninjau kembali status penerimaan.
                            </p>
                        </td>
                    </tr>

                    {{-- Info Akun Draft --}}
                    <tr>
                        <td style="padding: 0 35px 25px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f0fdf4; border: 1px solid #bbf7d0; border-left: 4px solid #16a34a;">
                                <tr>
                                    <td style="padding: 18px 20px;">
                                        <p style="margin: 0 0 10px 0; font-size: 13px; font-weight: bold; color: #15803d; text-transform: uppercase; letter-spacing: 0.5px;">
                                            🎉 Informasi Akun Siswa
                                        </p>
                                        <p style="margin: 0 0 12px 0; font-size: 13px; color: #333333; line-height: 1.6;">
                                            Berikut adalah akses sementara untuk portal siswa Anda. Segera ganti password setelah login pertama.
                                        </p>
                                        <table cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #d1fae5; width: 100%;">
                                            <tr>
                                                <td style="padding: 10px 15px; border-bottom: 1px solid #d1fae5;">
                                                    <span style="font-size: 12px; color: #6b7280; display: block; margin-bottom: 2px; text-transform: uppercase; letter-spacing: 0.5px;">Email Login</span>
                                                    <span style="font-size: 14px; font-weight: bold; color: #111111; font-family: monospace;">{{ $record->email }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 10px 15px;">
                                                    <span style="font-size: 12px; color: #6b7280; display: block; margin-bottom: 2px; text-transform: uppercase; letter-spacing: 0.5px;">Password Sementara</span>
                                                    <span style="font-size: 14px; font-weight: bold; color: #111111; font-family: monospace; letter-spacing: 2px;">{{ $draftPassword }}</span>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="margin: 10px 0 0 0; font-size: 11px; color: #6b7280; font-style: italic;">
                                            * Informasi akun ini bersifat sementara. Sekolah akan mengaktifkan akun Anda secara resmi saat daftar ulang.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding: 20px 35px; border-top: 1px solid #eeeeee; background-color: #f9f9f9;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="font-size: 12px; color: #888888; vertical-align: middle;">
                                        Tanggal terbit: {{ now()->translatedFormat('d F Y') }}<br>
                                        Panitia PPDB {{ $sekolah?->nama ?? config('app.name') }}
                                    </td>
                                    <td style="text-align: right; vertical-align: middle;">
                                        <a href="{{ config('app.url') }}"
                                            style="display: inline-block; padding: 10px 20px; background-color: #111111; color: #ffffff; text-decoration: none; font-size: 12px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
                                            Buka Situs Sekolah
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
