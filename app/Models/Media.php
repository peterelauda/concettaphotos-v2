<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = ['section_id', 'file_path', 'file_type', 'mime_type', 'caption_title', 'caption_description', 'sort_order', 'is_active'];

    protected $appends = ['full_url'];

    protected function fullUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->file_path ? Storage::url($this->file_path) : null,
        );
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
}
