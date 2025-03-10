<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded mt-10">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Welcome, Admin!</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.dashboard.submit') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium">Title</label>
            <input type="text" name="title" id="title" required
                   class="w-full border border-gray-300 px-4 py-2 rounded mt-1 focus:ring focus:border-blue-300">
        </div>

        <div class="mb-4">
            <label for="message" class="block text-gray-700 font-medium">Message</label>
            <textarea name="message" id="message" rows="4" required
                      class="w-full border border-gray-300 px-4 py-2 rounded mt-1 focus:ring focus:border-blue-300"></textarea>
        </div>

        <div class="text-right">
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-medium">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
