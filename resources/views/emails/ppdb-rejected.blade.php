<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Hasil Seleksi PPDB</title>
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
                                INFORMASI HASIL SELEKSI PPDB
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
                        <td style="padding: 15px 35px 25px;">
                            <p style="font-size: 14px; color: #333333; line-height: 1.8; margin: 0 0 15px 0;">
                                Dengan hormat,
                            </p>
                            <p style="font-size: 14px; color: #333333; line-height: 1.8; margin: 0 0 15px 0;">
                                Terima kasih atas partisipasi Anda dalam proses Penerimaan Peserta Didik Baru di
                                <strong>{{ $sekolah?->nama ?? 'sekolah kami' }}</strong>.
                            </p>
                            <p style="font-size: 14px; color: #333333; line-height: 1.8; margin: 0 0 15px 0;">
                                Setelah panitia meninjau dokumen pendaftaran, hasil seleksi, dan kuota penerimaan yang tersedia,
                                kami menyampaikan bahwa pendaftaran atas nama <strong>{{ $record->nama_lengkap }}</strong>
                                saat ini <strong style="color: #dc2626;">BELUM DAPAT DITERIMA</strong> untuk tahun ajaran
                                {{ now()->format('Y') }}/{{ now()->addYear()->format('Y') }}.
                            </p>
                            <p style="font-size: 14px; color: #333333; line-height: 1.8; margin: 0;">
                                Keputusan ini dibuat berdasarkan hasil seleksi dan daya tampung kelas. Kami menghargai usaha
                                yang telah dilakukan selama proses pendaftaran dan mendoakan kelancaran untuk pendidikan Anda selanjutnya.
                            </p>
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
                                            Buka Halaman Utama
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
