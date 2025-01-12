<x-app-layout>
    @section('title', 'Admin News')

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4 mt-6">Admin News</h1>

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title</label>
                <input type="text" name="title" id="title" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">Content</label>
                <textarea name="content" id="content" class="form-textarea mt-1 block w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="form-input mt-1 block w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Create News</button>
        </form>

        <form action="{{ route('admin.news.destroy') }}" method="POST" class="mb-6">
            @csrf
            @method('DELETE')
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title of News to Delete</label>
                <input type="text" name="title" id="title" class="form-input mt-1 block w-full" required>
            </div>
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">Delete News</button>
        </form>

        @foreach($newsItems as $newsItem)
            <div class="mb-4 p-6 border rounded-lg bg-white flex">
                {{-- image --}}
                <div class="flex-shrink-0 w-1/3">
                    <img src="{{ asset('storage/' . $newsItem->image) }}" 
                         alt="{{ $newsItem->title }}" 
                         class="w-full h-48 object-cover rounded-lg"> 
                </div>
                {{-- content --}}
                <div class="flex-1 ml-4">
                    <h2 class="text-2xl font-semibold mb-2 text-gray-800">{{ $newsItem->title }}</h2>
                    <p class="text-gray-500 text-sm">{{ $newsItem->created_at->format('F j, Y') }}</p>
                    <p class="text-gray-700 mt-4">{{ $newsItem->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
