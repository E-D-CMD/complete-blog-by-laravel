<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function list()
    {
        $posts = Post::with('user')
            ->orderByDesc('created_at')
            ->get();

        return view('list', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => ['required', 'string'],
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'content' => $data['content'],
        ]);

        return redirect('/');
    }

    public function show(Post $post)
    {
        $post->load('user');

        return view('show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('edit', [
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'content' => ['required', 'string'],
        ]);

        $post->update($data);

        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/');
    }
}