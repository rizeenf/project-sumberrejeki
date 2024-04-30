<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtOutletVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id', 'product_id', 'price_buy',
        'reason', 'store_id', 'pasar', 'patokan', 'created_at', 'updated_at'
    ];
}
