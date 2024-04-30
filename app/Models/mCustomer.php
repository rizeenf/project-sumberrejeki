<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mCustomer extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'phone',
        'photo',
        'address',
        'LA',
        'LO',
        'area',
        'subarea',
        'regist',
        'type',
        'banner',
        'branch_id',
        'staff_id',
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
