<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConcettalkPost extends Model
{
    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(ConcettalkComment::class)->whereNull('parent_id')->with('replies', 'user');
    }

    public function likes()
    {
        return $this->hasMany(ConcettalkLike::class);
    }
}