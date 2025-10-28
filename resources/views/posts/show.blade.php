<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
    <style>
        body { font-family: sans-serif; }
        .post-body { margin-top: 20px; padding: 10px; border: 1px solid #f0f0f0; white-space: pre-wrap; }
    </style>
</head>
<body>
    <a href="{{ route('posts.index') }}">← Back to List</a>
    <h1>{{ $post->title }}</h1>
    <p>
        <a href="{{ route('posts.edit', $post->id) }}">Edit Post</a> |
        Published: **{{ $post->created_at->format('M d, Y') }}**
    </p>
    <hr>
    <div class="post-body">
        {{ $post->body }}
    </div>
</body>
</html>