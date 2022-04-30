<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'reserved_at',
        'number',
    ];

    // public function getShopName()
    // {
    //     $shop_name = Shop::find($this->shop_id)->name;
    //     return $shop_name;
    // }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}