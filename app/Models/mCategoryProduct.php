<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mCategoryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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
