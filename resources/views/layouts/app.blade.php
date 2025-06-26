<!-- layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Task Manager')</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">
    <header class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-indigo-600">📝 Task Manager</a>
            <nav class="flex items-center space-x-4">
                @auth
                    <span class="text-sm">👋 {{ auth()->user()->name }}</span>
                    <a href="{{ url('/dashboard') }}" class="text-sm hover:underline">My Tasks</a>
                    <a href="{{ url('/create-task') }}" class="text-sm hover:underline">Create Task</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-sm hover:underline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="text-sm hover:underline">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="py-10">
        <div class="max-w-4xl mx-auto px-4">
            @yield('content')
        </div>
    </main>

    @livewireScripts
</body>
</html>
