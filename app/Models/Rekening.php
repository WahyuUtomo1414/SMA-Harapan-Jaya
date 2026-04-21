<?php

namespace App\Models;

use App\Traits\AuditedBySoftDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rekening extends Model
{
    use HasFactory, AuditedBySoftDelete, SoftDeletes;

    protected $table = 'rekening';

    protected $guarded = [];

    protected function casts(): array
    {
        return [];
    }
}
