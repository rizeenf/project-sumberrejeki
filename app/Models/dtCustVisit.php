<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtCustVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id', 'category_id', 'display_id',
        'stok', 'reason'
    ];
}
