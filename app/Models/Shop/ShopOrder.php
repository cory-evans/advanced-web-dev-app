<?php

namespace App\Models\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    use HasFactory;

    public $fillable = [
        'status',
        'total_price',
        'email'
    ];

    public function line_items() {
        return $this->hasMany(ShopOrderLineItem::class, 'order_id');
    }
}
