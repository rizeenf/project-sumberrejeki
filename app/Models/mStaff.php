<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mStaff extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'gender',
        'phone',
        'jabatan_id',
        'user_id',
        // MUST FILL
        'status',
        'disabled',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];
}
