<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
