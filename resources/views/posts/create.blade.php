<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <style>
        body { font-family: sans-serif; }
        .form-container { max-width: 500px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        input[type="text"], textarea { width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; }
        .error-list { color: red; list-style-type: none; padding-left: 0; }
    </style>
</head>
<body>
    <h1>Create New Post</h1>
    <a href="{{ route('posts.index') }}">← Back to List</a>
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

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div>
                <label for="body">Body:</label>
                <textarea name="body" id="body" rows="6">{{ old('body') }}</textarea>
            </div>
            <button type="submit">Submit Post</button>
        </form>
    </div>
</body>
</html>
