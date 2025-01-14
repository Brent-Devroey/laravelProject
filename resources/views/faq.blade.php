<x-app-layout>
    @section('title', 'FAQ')

    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 mt-6">Frequently Asked Questions</h1>

        @foreach($categories as $category)
            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4 text-gray-800 border-b-2 border-gray-300 pb-2">{{ $category->name }}</h2>

                @foreach($category->faqs as $faq)
                    <div class="mb-6 p-6 border border-gray-200 rounded-lg bg-white shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="mb-2">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $faq->question }}</h3>
                        </div>

                        <div class="mt-2 text-gray-700">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</x-app-layout>