<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = [
        'quantity',
        'total_price',
    ];

    protected $hidden = [
        'id',
        'company_id',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function getQuantityAttribute(): int
    {
        return 0;
    }

    public function getTotalPriceAttribute(): int
    {
        return 0;
    }
}
