<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Murid extends Model
{
    use HasFactory, AuditedBySoftDelete, SoftDeletes;

    protected $table = 'murid';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'tanggal_lahir' => 'date',
        ];
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'murid_id');
    }

    public function absensiDetail(): HasMany
    {
        return $this->hasMany(AbsensiDetail::class, 'murid_id');
    }

    public function nilai(): HasMany
    {
        return $this->hasMany(Nilai::class, 'murid_id');
    }
}
