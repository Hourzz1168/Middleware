<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">Laravel Blog</a>

            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="bg-gray-500 px-2 py-2 rounded-lg text-white">Admin
                        Dashboard</a>
                @endif

                <a href="{{ route('posts.index') }}" class="bg-[#0e6dfc] px-2 py-2 rounded-lg text-white">View Posts</a>

                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="bg-[#dd3548] px-2 py-2 rounded-lg text-white">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-success me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light">Register</a>
            @endauth
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="text-center py-3 mt-4 bg-light">
        <p>&copy; {{ date('Y') }} Laravel Blog</p>
    </footer>
</body>

</html>
