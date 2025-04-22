<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        return view('posts.index');
    }

    public function show($id, Request $request)
    {
        return view('posts.show', ['id' => $id]);
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id, Request $request)
    {
        return view('posts.edit', ['id' => $id]);
    }

    public function update($id, Request $request)
    {
        //
    }

    public function destroy($id, Request $request)
    {
        //
    }
}
