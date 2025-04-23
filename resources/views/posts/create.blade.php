@extends('layouts.main')

@section('content')
<div class="flex flex-col gap-6 p-6">
    <h1 class="text-4xl font-bold">Create Post</h1>

    <div class="px-8">
        @include(
            'posts.form',
            [
                'users' => $users,
                'method' => 'POST',
                'action' => route('posts.store')
            ]
        )
    </div>
</div>
@endsection