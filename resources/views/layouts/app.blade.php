<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Food Order App')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-background text-foreground">
    <header class="bg-card shadow">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-primary">Food Order App</a>
            <ul class="flex space-x-4">
                <li><a href="#" class="hover:text-primary">Menu</a></li>
                <li><a href="#" class="hover:text-primary">Cart</a></li>
                @auth
                    <li><a href="#" class="hover:text-primary">My Orders</a></li>
                    @if(auth()->user()->is_admin)
                        <li><a href="{{ route('admin.dashboard') }}" class="hover:text-primary">Admin Dashboard</a></li>
                    @endif
                    <li>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="hover:text-primary">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{route('login')}}" class="hover:text-primary">Login</a></li>
                    <li><a href="{{route('register')}}" class="hover:text-primary">Register</a></li>
                @endauth
                <li>
                    <button id="theme-toggle" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="hidden dark:inline-block"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="dark:hidden"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                    </button>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-card text-card-foreground mt-12">
        <div class="container mx-auto px-4 py-8">
            <p>&copy; {{ date('Y') }} Food Order App. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Theme toggle functionality
        const themeToggle = document.getElementById('theme-toggle');
        const html = document.documentElement;

        themeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        });

        // Check for saved theme preference or prefer-color-scheme
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
            html.classList.add('dark');
        }
    </script>
</body>
</html>