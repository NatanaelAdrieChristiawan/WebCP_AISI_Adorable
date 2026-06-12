<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'short_description', 'description',
        'features', 'specifications', 'image', 'gallery', 'whatsapp_message',
        'is_featured', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'features'       => 'array',
        'specifications' => 'array',
        'gallery'        => 'array',
        'is_featured'    => 'boolean',
        'is_active'      => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && \Storage::disk('public')->exists($this->image)) {
            return \Storage::url($this->image);
        }
        return asset('images/placeholder-product.jpg');
    }
}
