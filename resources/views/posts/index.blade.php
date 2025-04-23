@extends('layouts.main')

@section('content')
<div id="toast" class="toast toast-top toast-center top-[-6rem] {{session('success') ? 'top-[2rem]' : ''}} transition-all duration-200">
    <div class="flex items-center bg-white rounded shadow">
        <span class="flex items-center justify-center w-16 aspect-square rounded-tl rounded-bl bg-green-600">
            <svg class="w-12 aspect-square" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
        </span>
        <span class="p-4">{{session('success')}}</span>
    </div>
</div>
<div class="flex flex-col gap-6 p-6">
    <h1 class="text-4xl font-bold">Posts List</h1>
    <div class="px-2">
        <table class="table border">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr class="hover:bg-base-300">
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td class="flex gap-2">
                        <a class="btn btn-sm hover:bg-white" href="{{ route('posts.show', $post->id) }}">View</a>
                        <a class="btn btn-sm hover:bg-white" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <button
                            class="btn btn-sm bg-red-900 text-white font-bold hover:bg-red-800"
                            type="submit"
                            onclick="document.getElementById('delete_modal_{{ $post->id }}').showModal()">
                            Delete
                        </button>
                    </td>
                    <dialog id="delete_modal_{{ $post->id }}" class="modal">
                        <div class="modal-box">
                            <h1 class="text-2xl font-bold">Deleting Post {{$post->id}}</h1>
                            <p class="py-4">Are you sure you want to delete this post?</p>
                            <div class="modal-action">
                                <button class="btn" onclick="document.getElementById('delete_modal_{{ $post->id }}').close()">Close</button>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn bg-red-900 text-white font-bold hover:bg-red-800" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    const toast = document.getElementById('toast');
    setTimeout(() => {
        toast.classList.remove('top-[2rem]');
    }, 2000);
</script>
@endsection