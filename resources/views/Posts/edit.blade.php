@extends('layouts.app')

@section('content')
<h2>Edit Post</h2>

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title:</label>
    <input type="text" name="title" value="{{ $post->title }}" required>

    <label>Content:</label>
    <textarea name="content" required>{{ $post->content }}</textarea>

    <button type="submit">Update</button>
</form>
@endsection
