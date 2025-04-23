<div class="navbar bg-base-100 border-b">
    <div class="flex-1">
        <a class="btn btn-ghost text-2xl font-bold" href="{{route('posts.index')}}">Blog</a>
    </div>
    <div class="">
        <ul class="menu menu-horizontal">
            <li>
                <details class="relative">
                    <summary class="text-lg font-semibold">Posts</summary>
                    <ul class="z-10 w-40 right-0 text-lg flex flex-col gap-2">
                        <li
                            class="rounded text-lg font-medium hover:link
                            {{Route::currentRouteName() === 'posts.index' ? 'bg-red-900 text-white' : ''}}">
                            <a href="{{route('posts.index')}}">Posts List</a>
                        </li>
                        <li
                            class="rounded text-lg font-medium hover:link
                            {{Route::currentRouteName() === 'posts.create' ? 'bg-red-900 text-white' : ''}}">
                            <a href="{{route('posts.create')}}">Create Post</a>
                        </li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</div>