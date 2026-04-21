<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormPpdb extends Model
{
    use HasFactory, AuditedBySoftDelete, SoftDeletes;

    public const STATUS_PENDING  = 'pending';
    public const STATUS_DITERIMA = 'diterima';
    public const STATUS_DITOLAK  = 'ditolak';

    public const PEMBAYARAN_BELUM_BAYAR = 'belum_bayar';
    public const PEMBAYARAN_MENUNGGU_KONFIRMASI = 'menunggu_konfirmasi';
    public const PEMBAYARAN_LUNAS = 'lunas';

    protected $table = 'form_ppdb';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'anak_ke'       => 'integer',
            'dari'          => 'integer',
            'tinggi_badan'  => 'integer',
            'berat_badan'   => 'integer',
            'status'        => 'boolean',
        ];
    }
}
