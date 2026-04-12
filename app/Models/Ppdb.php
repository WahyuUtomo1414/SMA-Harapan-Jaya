<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ppdb extends Model
{
    use HasFactory, AuditedBySoftDelete, SoftDeletes;

    protected $table = 'ppdb';

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'alur_ppdb' => 'array',
            'persyaratan' => 'array',
            'timeline' => 'array',
            'kontak' => 'array',
        ];
    }
}
