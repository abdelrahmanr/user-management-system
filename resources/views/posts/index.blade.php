<!DOCTYPE html>
<html>
<head>
    <title>Posts Index</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6">Posts List</h1>

    <a href="{{ route('posts.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Add New Post
    </a>

    <table class="min-w-full bg-white border border-gray-300 shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Body</th>
                <th class="py-2 px-4 border-b">Username</th>
                <th class="py-2 px-4 border-b">Image</th>
                <th class="py-2 px-4 border-b">Created At</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr class="text-center border-b hover:bg-gray-100 {{ $post->trashed() ? 'bg-red-100' : '' }}">
                    <td class="py-2 px-4">{{ $post->id }}</td>
                    <td class="py-2 px-4">{{ $post->title }}</td>
                    <td class="py-2 px-4">{{ Str::limit($post->body, 50) }}</td>
                    <td class="py-2 px-4">{{ $post->user->name }}</td>
                    <td class="py-2 px-4">
                        @if($post->image)
                            <img src="{{ asset('storage/'.$post->image) }}" alt="Post Image" class="w-16 h-16 object-cover mx-auto">
                        @endif
                    </td>
                    <td class="py-2 px-4">{{ $post->created_at->format('d M Y, h:i A') }}</td>
                    <td class="py-2 px-4 space-x-2">
                        @if($post->trashed())
                            <form action="{{ route('posts.restore', $post->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Restore
                                </button>
                            </form>
                        @else
                            <a href="{{ route('posts.show', $post->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Show</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>

</body>
</html>
