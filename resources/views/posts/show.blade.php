<!DOCTYPE html>
<html>
<head>
    <title>Show Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6">Post Details</h1>

    <div class="bg-white p-6 rounded shadow-md max-w-md mx-auto">
        <p class="mb-2"><span class="font-bold">ID:</span> {{ $post->id }}</p>
        <p class="mb-2"><span class="font-bold">Title:</span> {{ $post->title }}</p>
        <p class="mb-2"><span class="font-bold">Body:</span> {{ $post->body }}</p>
        <p class="mb-2"><span class="font-bold">User ID:</span> {{ $post->user_id }}</p>
        <p class="mb-2"><span class="font-bold">Created At:</span> {{ $post->created_at->format('d M Y, h:i A') }}</p>
        @if($post->trashed())
            <p class="mb-2 text-red-500"><span class="font-bold">Deleted At:</span> {{ $post->deleted_at->format('d M Y, h:i A') }}</p>
        @endif
    </div>

    <div class="mt-4 text-center">
        <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back</a>
    </div>

</body>
</html>
