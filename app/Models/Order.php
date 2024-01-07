<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'medicines',
        'nama_customer',
        'total_price',
    ];

    protected $casts = [
        'medicines' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}

