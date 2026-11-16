<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ConcettalkService;

class ConcettalkController extends Controller
{
    protected $concettalkService;

    public function __construct(ConcettalkService $concettalkService)
    {
        $this->concettalkService = $concettalkService;
    }

    public function toggleLike(Request $request, $id)
    {
        $result = $this->concettalkService->toggleLike($id, $request->ip());
        return response()->json($result);
    }

    public function storeComment(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:concettalk_posts,id',
            'content' => 'required|string|max:500',
            'guest_name' => 'nullable|string|max:50',
            'parent_id' => 'nullable|exists:concettalk_comments,id',
        ]);

        $comment = $this->concettalkService->addComment($validated);
        return response()->json($comment->load('user'));
    }
}