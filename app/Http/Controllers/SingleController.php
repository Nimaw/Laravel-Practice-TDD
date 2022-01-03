<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SingleController extends Controller
{
    public function __invoke(Post $post)
    {
        $comments = $post
            ->comments()
            ->latest()
            ->paginate(15);
        return view('single', compact('post', 'comments'));
    }

    public function comment(Request $request, Post $post)
    {
        $post->comments()->create([
            'user_id' => Auth::id(),
            'description' => $request->description,
        ]);
        return [
            'created' => true
        ];
    }
}
