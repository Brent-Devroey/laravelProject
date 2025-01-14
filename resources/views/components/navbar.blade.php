<nav class="bg-gray-800 p-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-white text-2xl font-bold tracking-wide">
            <h1>Binder</h1>
        </a>
        <ul class="flex justify-between space-x-4 text-white">
            <li class="px-2"><a href="{{ route('home') }}" class="hover:text-gray-300">Home</a></li>
            <li class="px-2"><a href="{{ route('faq') }}" class="hover:text-gray-300">FAQ</a></li>
            <li class="px-2"><a href="{{ route('news') }}" class="hover:text-gray-300">News</a></li>
            <li class="px-2"><a href="{{ route('contact.form') }}" class="hover:text-gray-300">Contact</a></li>
        </ul>

        <form action="{{ route('search.username') }}" method="GET" class="flex items-center space-x-2">
            <input type="text" name="username" placeholder="Search by username" class="px-4 py-2 rounded-md" required>
            <button type="submit" style="background-color:rgb(0, 81, 174);" class="text-white py-2 px-4 rounded transition">Search</button>
        </form>
        @auth
            <ul class="flex items-center space-x-4">
                <li>
                    <a href="{{ route('profile.show', auth()->user()->id) }}" class="text-white hover:text-gray-300">Profile</a>
                </li>
                @if(auth()->user()->is_admin)
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-300">Admin Dashboard</a>
                    </li>
                @endif
                <li>
                    <form action="{{ route('logout') }}" method="POST" aria-label="Logout">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        @else
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Register</a>
            </div>
        @endauth
    </div>
</nav>