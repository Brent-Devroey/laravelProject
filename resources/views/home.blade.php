@auth
<x-app-layout>
    @section('title', 'Binder - Your Library')
    <div class="max-w-4xl mx-auto p-6">
        <div class="flex justify-end mb-6">
            @auth
                <a href="{{ route('books.create') }}"
                   class="bg-blue-500 text-white rounded-full p-4 shadow-lg hover:bg-blue-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
            @endauth
        </div>
        <h1 class="text-3xl font-bold mb-6">Your Library</h1>

        @auth
            <!-- Show books if the user is logged in -->
            @if ($books->count() > 0)
                <div class="grid lg:grid-cols-3 gap-6">
                    @foreach ($books as $book)
                        <div class="bg-white rounded-lg p-4">
                            <form method="POST" action="{{ route('books.destroy', $book->id) }}" class="absolute">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white rounded-full px-4 py-2 hover:bg-red-600">
                                    X
                                </button>
                            </form>
                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="w-auto h-48 rounded-md mb-4">
                            <h2 class="text-xl font-semibold">{{ $book->title }}</h2>
                            <p class="text-sm text-gray-600">{{ $book->description }}</p>
                            <p class="mt-2 font-bold">Rating: {{ $book->rating }}/5</p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600 text-center">You don't have any books in your library yet. Start adding some!</p>
            @endif
        @endauth
    </div>
</x-app-layout>
@endauth

@guest
<x-guest-layout>
    @section('title', 'Welcome to Binder')
    <div class="max-w-4xl mx-auto p-6 text-center">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-6">Welcome to <span class="text-blue-600">Binder</span></h1>
        <p class="text-xl text-gray-600 mb-8">
            Your go-to platform to discover, rate, and organize books you love. 
            Create your personal library and share your thoughts with the world.
        </p>
        <div class="grid lg:grid-cols-3 gap-6 text-left">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Discover New Books</h2>
                <p class="text-gray-600">Search through a vast collection of books and find your next great read.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Rate & Review</h2>
                <p class="text-gray-600">Share your opinions by rating and reviewing the books you’ve read.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Build Your Library</h2>
                <p class="text-gray-600">Organize your favorite books and showcase them in your personal library.</p>
            </div>
        </div>
    </div>
</x-guest-layout>
@endguest