<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $hidden = [
        'id',
        'company_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
