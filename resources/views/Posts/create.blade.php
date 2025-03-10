@extends('layouts.app')

@section('content')
<h2>Create Post</h2>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <label>Title:</label>
    <input type="text" name="title" required>

    <label>Content:</label>
    <textarea name="content" required></textarea>

    <button type="submit">Create</button>
</form>
@endsection
