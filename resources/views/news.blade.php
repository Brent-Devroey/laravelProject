<x-app-layout>
    @section('title', 'News')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6 mt-6">News</h1>
        
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

