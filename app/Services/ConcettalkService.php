<?php
namespace App\Services;

use App\Models\ConcettalkPost;
use App\Models\ConcettalkComment;
use App\Models\ConcettalkLike;
use Illuminate\Support\Facades\Auth;

class ConcettalkService
{
    public function getActivePosts()
    {
        return ConcettalkPost::where('is_active', true)
            ->withCount('likes')
            ->with(['comments'])
            ->latest()
            ->get();
    }

    public function toggleLike($postId, $ipAddress)
    {
        $userId = Auth::id();

        $like = ConcettalkLike::where('concettalk_post_id', $postId)
            ->where(function ($q) use ($userId, $ipAddress) {
                if ($userId)
                    $q->where('user_id', $userId);
                else
                    $q->where('ip_address', $ipAddress);
            })->first();

        if ($like) {
            $like->delete();
            return ['status' => 'unliked'];
        }

        ConcettalkLike::create([
            'concettalk_post_id' => $postId,
            'user_id' => $userId,
            'ip_address' => $ipAddress
        ]);
        return ['status' => 'liked'];
    }

    public function addComment($data)
    {
        return ConcettalkComment::create([
            'concettalk_post_id' => $data['post_id'],
            'user_id' => Auth::id(),
            'guest_name' => Auth::check() ? null : ($data['guest_name'] ?? 'Anonymous'),
            'parent_id' => $data['parent_id'] ?? null,
            'content' => $data['content'],
        ]);
    }
}