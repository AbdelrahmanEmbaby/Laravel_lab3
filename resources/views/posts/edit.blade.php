@extends('layouts.main')

@section('content')
<div class="flex flex-col gap-6 p-6">
    <h1 class="text-4xl font-bold">Edit Post <span class="text-red-900 text-2xl font-normal">#{{$post->id}}</span></h1>

    <div class="px-8">
        @include(
            'posts.form',
            [
                'post' => $post,
                'users' => $users,
                'method' => 'PUT',
                'action' => route('posts.update', $post->id)
            ]
        )
    </div>
</div>
@endsection