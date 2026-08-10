<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    protected $fillable = ['key', 'title', 'subtitle', 'content', 'link_url', 'type', 'is_active'];

    public function media(): HasMany
    {
        return $this->hasMany(Media::class)->where('is_active', true)->orderBy('sort_order', 'asc');
    }
}
