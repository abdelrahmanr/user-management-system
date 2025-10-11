<!DOCTYPE html>
<html>
<head>
    <title>Confirm Delete</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-md mx-auto bg-white p-6 rounded shadow-md text-center">
    <h1 class="text-2xl font-bold mb-4">Delete Post #{{ $post->id }}</h1>
    <p class="mb-6">
        Are you sure you want to delete 
        <strong>{{ $post->title }}</strong> (User ID: {{ $post->user_id }})?
    </p>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="space-x-2 inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Yes, Delete
        </button>
    </form>

    <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Cancel
    </a>
</div>

</body>
</html>
