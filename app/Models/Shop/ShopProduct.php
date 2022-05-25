<?php

namespace App\Models\Shop;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'description',
        'price_cents',
        'is_featured',
        'media_id',
        'category_id'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function displayPrice() {
        return number_format($this->price_cents / 100, 2);
    }

    public function media() {
        return $this->BelongsTo(Media::class);
    }

    public function category() {
        return $this->belongsTo(ShopProductCategory::class);
    }
}
