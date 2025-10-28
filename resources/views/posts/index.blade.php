<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
    <style>
        body { font-family: sans-serif; }
        .post-card { border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 5px; }
        .success-message { color: green; background-color: #e6ffe6; padding: 10px; margin-bottom: 20px; border: 1px solid #c8e6c9; }
        .post-title a { text-decoration: none; color: #007bff; }
    </style>
</head>
<body>
    <h1>Blog Posts</h1>

    @if ($message = Session::get('success'))
        <div class="success-message">{{ $message }}</div>
    @endif

    <a href="{{ route('posts.create') }}">**+ Create New Post**</a>
    <hr>

    @foreach ($posts as $post)
        <div class="post-card">
            <h2 class="post-title">
                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
            </h2>
            <p>{{ Str::limit($post->body, 150) }}</p>

            <a href="{{ route('posts.edit', $post->id) }}">Edit</a> |

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    @endforeach

    @if($posts->isEmpty())
        <p>No posts found.</p>
    @endif
</body>
</html>