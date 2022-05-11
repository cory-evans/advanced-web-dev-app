<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrderLineItem extends Model
{
    use HasFactory;

    public function order() {
        return $this->belongsTo(ShopOrder::class);
    }

    public function product() {
        return $this->belongsTo(ShopProduct::class);
    }
}
