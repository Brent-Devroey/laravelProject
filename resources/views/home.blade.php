<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="navbar-logo">Test</a>
            @auth
                <ul class="navbar-menu">
                    <a href="{{route('faq')}}">FAQ</a>
                    <a href="{{route('news')}}">News</a>
                    <a href="{{route('contact')}}">Contact</a>
                </ul>
                <div class="navbar-actions">
                <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">
                            Logout
                        </button>
                    </form>
                </div>
            @else
                <div class="navbar-actions">
                    <a href="{{ route('login')}}">Login</a>
                    <a href="{{ route('register')}}">Register</a>
                </div>
            @endauth
        </div>
    </nav>
</body>
</html>