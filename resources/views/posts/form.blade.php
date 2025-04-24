<form action="{{ $action }}" method="POST" class="flex flex-col gap-4">
    @csrf
    @method($method)
    <div class="flex flex-col gap-2">
        <label class="font-semibold">
            <span class="label-text">Title</span>
        </label>
        <input type="text" name="title" class="input input-bordered" value="{{ old('title', isset($post) ? $post->title : null) }}" />
        @error('title')
        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex flex-col gap-2">
        <label class="font-semibold">
            <span class="label-text">Body</span>
        </label>
        <textarea class="textarea textarea-bordered min-h-60 min-w-200" name="body">{{ old('body', isset($post) ? $post->body : null) }}</textarea>
        @error('body')
        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit" class="btn">Save</button>
    </div>
</form>