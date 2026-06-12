<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'image', 'description', 'category', 'is_active', 'sort_order'];

    protected $casts = ['is_active' => 'boolean'];

    public function getImageUrlAttribute(): string
    {
        if ($this->image && \Storage::disk('public')->exists($this->image)) {
            return \Storage::url($this->image);
        }
        return asset('images/placeholder-gallery.jpg');
    }
}
