<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.app')

@section('content')
    <h2>Posts</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @can('view-dashboard')
        <p>Admin Access Granted</p>
    @endcan


    <a class="hover:text-blue-500 hover:underline" href="{{ route('posts.create') }}">Create Post</a>

    @foreach ($posts as $post)
        <div class="bg-white shadow-md rounded-xl p-6 mb-4 border border-gray-200">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h3>
            <p class="text-gray-600 mb-4">{{ $post->content }}</p>

            <div class="flex flex-col gap-3 mt-4">
                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}"
                        class="w-24 text-center py-2 bg-yellow-400 text-white rounded hover:bg-yellow-500 transition duration-200">
                        Edit
                    </a>
                @endcan

                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-24 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">
                            Delete
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    @endforeach
@endsection
