<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlurPpdb extends Model
{
    use HasFactory, AuditedBySoftDelete, SoftDeletes;

    protected $table = 'alur_ppdb';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'urutan' => 'integer',
        ];
    }
}
