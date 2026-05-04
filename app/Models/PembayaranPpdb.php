<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembayaranPpdb extends Model
{
    use HasFactory, AuditedBySoftDelete, SoftDeletes;

    protected $table = 'pembayaran_ppdb';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'nominal' => 'float',
            'status' => 'boolean',
        ];
    }
}
