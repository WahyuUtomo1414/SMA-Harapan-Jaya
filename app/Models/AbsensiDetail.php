<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbsensiDetail extends Model
{
    use HasFactory, AuditedBySoftDelete, SoftDeletes;

    protected $table = 'absensi_detail';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }

    public function absensi(): BelongsTo
    {
        return $this->belongsTo(Absensi::class, 'absensi_id');
    }

    public function murid(): BelongsTo
    {
        return $this->belongsTo(Murid::class, 'murid_id');
    }
}
