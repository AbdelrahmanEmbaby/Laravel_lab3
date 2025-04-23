@extends('layouts.main')

@section('content')
<div class="flex flex-col gap-2 p-6">
    <h1 class="text-4xl font-bold">{{ $post->title }} <span class="text-red-900 text-2xl font-normal">#{{$post->id}}</span></h1>

    <div>
        <p class="p-4">{{ $post->body }}</p>
        <p class="font-bold">Author: <span class="font-normal">{{ $post->user->name }}</span></p>
        <p class="font-bold">Created at: <span class="font-normal">{{ $post->created_at->diffForHumans() }}</span></p>
    </div>
</div>
@endsection