<?php

namespace App\Http\Controllers;

use App\Events\PostApproved;
use App\Events\PostDenied;
use App\Models\Post;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'posts' => Post::whereNull('approved_at')->latest()->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('admin.show', [
            'post' => $post,
        ]);
    }

    /**
     * Approves a post
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function approve(Post $post)
    {
        $post->update(['approved_at' => now()]);

        event(new PostApproved($post));

        return redirect(route('post.show', $post));
    }

    /**
     * Declines a post approval, and softdeletes the post.
     *
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function decline(Post $post)
    {
        $post->delete();

        event(new PostDenied($post));

        return redirect(route('admin.index'));
    }
}
