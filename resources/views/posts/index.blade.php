@extends('layouts.main')

@section('content')
<div id="toast" class="toast toast-top toast-center top-[-6rem] {{session('success') || session('error') ? 'top-[2rem]' : ''}} transition-all duration-200">
    <div class="flex items-center bg-white rounded shadow">
        @if (session('error'))
        <span class="flex items-center justify-center w-16 aspect-square rounded-tl rounded-bl bg-red-600">
            <svg class="w-12 aspect-square" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M7.493 0.015 C 7.442 0.021,7.268 0.039,7.107 0.055 C 5.234 0.242,3.347 1.208,2.071 2.634 C 0.660 4.211,-0.057 6.168,0.009 8.253 C 0.124 11.854,2.599 14.903,6.110 15.771 C 8.169 16.280,10.433 15.917,12.227 14.791 C 14.017 13.666,15.270 11.933,15.771 9.887 C 15.943 9.186,15.983 8.829,15.983 8.000 C 15.983 7.171,15.943 6.814,15.771 6.113 C 14.979 2.878,12.315 0.498,9.000 0.064 C 8.716 0.027,7.683 -0.006,7.493 0.015 M8.853 1.563 C 9.967 1.707,11.010 2.136,11.944 2.834 C 12.273 3.080,12.920 3.727,13.166 4.056 C 13.727 4.807,14.142 5.690,14.330 6.535 C 14.544 7.500,14.544 8.500,14.330 9.465 C 13.916 11.326,12.605 12.978,10.867 13.828 C 10.239 14.135,9.591 14.336,8.880 14.444 C 8.456 14.509,7.544 14.509,7.120 14.444 C 5.172 14.148,3.528 13.085,2.493 11.451 C 2.279 11.114,1.999 10.526,1.859 10.119 C 1.618 9.422,1.514 8.781,1.514 8.000 C 1.514 6.961,1.715 6.075,2.160 5.160 C 2.500 4.462,2.846 3.980,3.413 3.413 C 3.980 2.846,4.462 2.500,5.160 2.160 C 6.313 1.599,7.567 1.397,8.853 1.563 M7.706 4.290 C 7.482 4.363,7.355 4.491,7.293 4.705 C 7.257 4.827,7.253 5.106,7.259 6.816 C 7.267 8.786,7.267 8.787,7.325 8.896 C 7.398 9.033,7.538 9.157,7.671 9.204 C 7.803 9.250,8.197 9.250,8.329 9.204 C 8.462 9.157,8.602 9.033,8.675 8.896 C 8.733 8.787,8.733 8.786,8.741 6.816 C 8.749 4.664,8.749 4.662,8.596 4.481 C 8.472 4.333,8.339 4.284,8.040 4.276 C 7.893 4.272,7.743 4.278,7.706 4.290 M7.786 10.530 C 7.597 10.592,7.410 10.753,7.319 10.932 C 7.249 11.072,7.237 11.325,7.294 11.495 C 7.388 11.780,7.697 12.000,8.000 12.000 C 8.303 12.000,8.612 11.780,8.706 11.495 C 8.763 11.325,8.751 11.072,8.681 10.932 C 8.616 10.804,8.460 10.646,8.333 10.580 C 8.217 10.520,7.904 10.491,7.786 10.530 " stroke="none" fill-rule="evenodd" fill="#ffffff"></path>
                </g>
            </svg>
        </span>
        <span class="p-4">{{session('error')}}</span>
        @elseif (session('success'))
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
        @endif
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
                        @if(Auth::user()?->id === $post->user_id)
                        <a class="btn btn-sm hover:bg-white" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <button
                            class="btn btn-sm bg-red-900 text-white font-bold hover:bg-red-800"
                            type="submit"
                            onclick="document.getElementById('delete_modal_{{ $post->id }}').showModal()">
                            Delete
                        </button>
                        @endif
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