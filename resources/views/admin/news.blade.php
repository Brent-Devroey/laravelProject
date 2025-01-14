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

        <h2 class="text-xl font-semibold mb-4">Existing News Items</h2>
        @foreach($newsItems as $newsItem)
            <div class="mb-4 p-6 border rounded-lg bg-white flex">
                <div class="flex-shrink-0 w-1/3">
                    <img src="{{ asset('storage/' . $newsItem->image) }}" 
                         alt="{{ $newsItem->title }}" 
                         class="w-full h-48 object-cover rounded-lg"> 
                </div>
                <div class="flex-1 ml-4">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $newsItem->title }}</h3>
                    <p class="text-gray-500 text-sm">{{ $newsItem->created_at->format('F j, Y') }}</p>
                    <p class="text-gray-700 mt-4">{{ $newsItem->content }}</p>

                    <form method="POST" action="{{ route('admin.news.update', $newsItem->id) }}" enctype="multipart/form-data" class="mt-4">
                        @csrf
                        @method('PUT')

                        <label for="update_title_{{ $newsItem->id }}" class="block text-gray-700">Update Title</label>
                        <input type="text" name="title" id="update_title_{{ $newsItem->id }}" value="{{ $newsItem->title }}" class="form-input mt-1 block w-full" required>

                        <label for="update_content_{{ $newsItem->id }}" class="block text-gray-700 mt-4">Update Content</label>
                        <textarea name="content" id="update_content_{{ $newsItem->id }}" class="form-textarea mt-1 block w-full" required>{{ $newsItem->content }}</textarea>

                        <label for="update_image_{{ $newsItem->id }}" class="block text-gray-700 mt-4">Update Image</label>
                        <input type="file" name="image" id="update_image_{{ $newsItem->id }}" class="form-input mt-1 block w-full">

                        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Update News</button>
                    </form>

                    <form action="{{ route('admin.news.destroy', $newsItem->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
</x-app-layout>