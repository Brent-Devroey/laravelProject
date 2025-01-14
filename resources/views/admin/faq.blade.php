<x-app-layout>
    @section('title', 'Admin FAQ')

    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4 mt-6">Admin FAQ</h1>

        <!-- Add FAQ Form -->
        <form action="{{ route('admin.faq.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="mb-4">
                <label for="question" class="block text-gray-700">Question</label>
                <input type="text" name="question" id="question" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="answer" class="block text-gray-700">Answer</label>
                <textarea name="answer" id="answer" class="form-textarea mt-1 block w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Category</label>
                <select name="category_id" id="category_id" class="form-select mt-1 block w-full" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Create FAQ</button>
        </form>

        <h2 class="text-xl font-semibold mb-4">Existing FAQs</h2>
        @foreach($faqs as $faq)
            <div class="mb-4 p-6 border rounded-lg bg-white flex">
                <div class="flex-1 ml-4">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $faq->question }}</h3>
                    <p class="text-gray-500 text-sm">{{ $faq->created_at->format('F j, Y') }}</p>
                    <p class="text-gray-700 mt-4">{{ $faq->answer }}</p>
                    <p class="text-gray-500 mt-2"><strong>Category:</strong> {{ $faq->categories->pluck('name')->join(', ') }}</p>

                    <form method="POST" action="{{ route('admin.faq.update', $faq->id) }}" class="mt-4">
                        @csrf
                        @method('PUT')
                        <label for="update_question_{{ $faq->id }}" class="block text-gray-700">Update Question</label>
                        <input type="text" name="question" id="update_question_{{ $faq->id }}" value="{{ $faq->question }}" class="form-input mt-1 block w-full" required>

                        <label for="update_answer_{{ $faq->id }}" class="block text-gray-700 mt-4">Update Answer</label>
                        <textarea name="answer" id="update_answer_{{ $faq->id }}" class="form-textarea mt-1 block w-full" required>{{ $faq->answer }}</textarea>

                        <label for="update_category_id_{{ $faq->id }}" class="block text-gray-700 mt-4">Update Category</label>
                        <select name="category_id" id="update_category_id_{{ $faq->id }}" class="form-select mt-1 block w-full" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(in_array($category->id, $faq->categories->pluck('id')->toArray())) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">Update FAQ</button>
                    </form>

                    <form method="POST" action="{{ route('admin.faq.destroy', $faq->id) }}" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-300">Delete FAQ</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>