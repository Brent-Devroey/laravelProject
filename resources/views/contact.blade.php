<x-app-layout>
    @section('title', 'Your Profile')
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Contact Form</h1>
        <form action="{{ route('contact.submit') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-bold mb-2">Message:</label>
                <textarea id="message" name="message" required class="w-full p-2 border border-gray-300 rounded"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Submit</button>
        </form>
    </div>
</x-app-layout>