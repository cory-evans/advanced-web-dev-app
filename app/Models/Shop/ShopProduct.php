<?php

namespace App\Models\Shop;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopProduct extends Model
{
    use HasFactory;

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function displayPrice() {
        return number_format($this->price_cents / 100, 2);
    }

    public function media() {
        return $this->BelongsTo(Media::class);
    }
}
