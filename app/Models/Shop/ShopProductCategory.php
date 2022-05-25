<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProductCategory extends Model
{
    use HasFactory;

    public $fillable = [
        'name'
    ];

    public function products() {
        $this->hasMany(ShopProduct::class, 'category_id');
    }
}
