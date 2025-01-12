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
        @else
            <!-- Show placeholder for guests -->
            <p class="text-gray-600 text-center">Please login to see your library.</p>
        @endauth
    </div>
</x-app-layout>
