<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPost extends Model
{
    protected $fillable = [
        'user_id', 'title', 'slug', 'excerpt', 'content',
        'featured_image', 'status', 'published_at',
        'meta_title', 'meta_description', 'view_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'view_count'   => 'integer',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->where('published_at', '<=', now());
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->featured_image && \Storage::disk('public')->exists($this->featured_image)) {
            return \Storage::url($this->featured_image);
        }
        return asset('images/placeholder-blog.jpg');
    }
}
