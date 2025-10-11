<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-md mx-auto bg-white p-6 rounded shadow-md">

    <h1 class="text-3xl font-bold mb-6 text-center">Add New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf

        <div>
            <label class="block font-bold mb-1">Title:</label>
            <input type="text" name="title" placeholder="Enter title"
                   value="{{ old('title') }}"
                   class="w-full border px-3 py-2 rounded">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-bold mb-1">Body:</label>
            <textarea name="body" placeholder="Enter body"
                      class="w-full border px-3 py-2 rounded">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-bold mb-1">Creator:</label>
            <select name="user_id" class="w-full border px-3 py-2 rounded">
                <option value="">-- Select User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block font-bold mb-1">Post Image:</label>
            <input type="file" name="image" class="w-full border px-3 py-2 rounded">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full">
            Add Post
        </button>
        <a href="{{ route('posts.index') }}"
           class="block text-center mt-2 text-gray-500 hover:underline">
            Back to Posts List
        </a>
    </form>

</div>

</body>
</html>
