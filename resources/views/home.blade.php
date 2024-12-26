<x-app-layout>
    @section('title', 'Binder - Your Library')
    <div class="max-w-4xl mx-auto p-6">
        <div class="flex justify-end mb-6">
            <a href="{{ route('books.create') }}"
               class="bg-blue-500 text-white rounded-full p-4 shadow-lg hover:bg-blue-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </a>
        </div>
        <h1 class="text-3xl font-bold mb-6">Your Library</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($books as $book)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <form method="POST" action="{{ route('books.destroy', $book->id) }}" class="absolute top-2 right-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white rounded-full p-2 hover:bg-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="w-full h-48 object-cover rounded-md mb-4">
                    <h2 class="text-xl font-semibold">{{ $book->title }}</h2>
                    <p class="text-sm text-gray-600">{{ $book->description }}</p>
                    <p class="mt-2 font-bold">Rating: {{ $book->rating }}/5</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
