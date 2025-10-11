<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<h1 class="text-3xl font-bold mb-6 text-center">Edit Post #{{ $post->id }}</h1>

<form action="{{ route('posts.update', $post->id) }}" method="POST"
      class="bg-white p-6 rounded shadow-md max-w-md mx-auto space-y-4"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label class="font-bold">Title:</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}"
               class="w-full border px-3 py-2 rounded">
        @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="font-bold">Body:</label>
        <textarea name="body" class="w-full border px-3 py-2 rounded">{{ old('body', $post->body) }}</textarea>
        @error('body')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="font-bold">Creator:</label>
        <select name="user_id" class="w-full border px-3 py-2 rounded">
            <option value="">-- Select User --</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="font-bold">Post Image:</label>
        <input type="file" name="image" class="w-full border px-3 py-2 rounded">
        @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" class="w-32 h-32 object-cover mt-2">
        @endif
        @error('image')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Update
    </button>
    <a href="{{ route('posts.index') }}"
       class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Cancel
    </a>
</form>

</body>
</html>
