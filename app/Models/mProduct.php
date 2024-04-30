<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'picture',
        'competitor',
        'competitor_name',
        'category_id',
        'brand_id',
        'subbrand_id',
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
