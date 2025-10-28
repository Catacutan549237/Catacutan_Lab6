<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <style>
        body { font-family: sans-serif; }
        .form-container { max-width: 500px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="text"], textarea { width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; }
        .error-list { color: red; list-style-type: none; padding-left: 0; }
    </style>
</head>
<body>
    <h1>Edit Post: {{ $post->title }}</h1>
    <a href="{{ route('posts.show', $post->id) }}">← Back to Post</a>
    <hr>

    <div class="form-container">
        @if ($errors->any())
            <div style="margin-bottom: 15px;">
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
            </div>
            <div>
                <label for="body">Body:</label>
                <textarea name="body" id="body" rows="6">{{ old('body', $post->body) }}</textarea>
            </div>
            <button type="submit">Update Post</button>
        </form>
    </div>
</body>
</html>