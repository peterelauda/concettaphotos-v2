<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConcettalkComment extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(ConcettalkComment::class, 'parent_id')->with('user');
    }
}