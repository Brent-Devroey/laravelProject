<nav class="bg-gray-800 p-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <a href="#" class="text-white text-xl font-bold">Test</a>
        
        @auth
            <ul class="flex justify-between space-x-4 text-white">
                <li class="px-2"><a href="{{ route('home') }}" class="hover:text-gray-300">Home</a></li>
                <li class="px-2"><a href="{{ route('faq') }}" class="hover:text-gray-300">FAQ</a></li>
                <li class="px-2"><a href="{{ route('news') }}" class="hover:text-gray-300">News</a></li>
                <li class="px-2"><a href="{{ route('contact.form') }}" class="hover:text-gray-300">Contact</a></li>
                <li class="px-2"><a href="{{ route('profile') }}" class="hover:text-gray-300">Profile</a></li>
            </ul>

            <div class="flex items-center space-x-4">
                <form action="{{ route('logout') }}" method="POST" aria-label="Logout">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition">
                        Logout
                    </button>
                </form>
            </div>
        @else
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Register</a>
            </div>
        @endauth
    </div>
</nav>