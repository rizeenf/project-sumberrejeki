<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tVisit extends Model
{
    use HasFactory;

    // protected $primary_key = 'id';

    protected $fillable = [
        'date',
        'order',
        'timeIn',
        'timeOut',
        'LA',
        'LO',
        'gift',
        'product_id',
        'qty_sample',
        'banner',
        'activity',
        'notes',
        'register',
        'qtysell',
        'customer_id',
        'staff_id',
        'created_at',
        'updated_at'
    ];
}
