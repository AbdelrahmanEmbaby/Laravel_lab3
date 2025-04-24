<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use App\Events\PostCreated;
use App\Events\PostDeleted;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        return view('posts.show', ['post' => $post, 'user' => $user]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

        $validated['user_id'] = Auth::user()->id;
        $post = Post::create($validated);
        event(new PostCreated($post));

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $users = User::all();
        if ($post->user_id !== Auth::user()->id) {
            return redirect()->route('posts.index')->with('error', 'You are not authorized to edit this post');
        }
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $validated = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy($id, Request $request)
    {
        $post = Post::find($id);
        $post->delete();

        event(new PostDeleted($post));
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
