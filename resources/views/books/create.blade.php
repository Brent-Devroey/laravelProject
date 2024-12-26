<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add a New Book</h1>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="list-disc list-inside text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="w-full border-gray-300 rounded-md" required></textarea>
            </div>

            <div class="mb-4">
                <label for="rating" class="block font-medium text-gray-700">Rating (1-5)</label>
                <input type="number" name="rating" id="rating" class="w-full border-gray-300 rounded-md" min="1" max="5" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-md" required>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                    Add Book
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
