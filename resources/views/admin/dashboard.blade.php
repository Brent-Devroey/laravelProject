<x-app-layout>
@section('title', 'Admin Dashboard')

<div class="container mx-auto p-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-6">Admin Dashboard</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Users Management Button -->
            <div class="bg-gray-800 text-white text-center p-6 rounded-lg shadow-lg hover:bg-gray-700 transition">
                <a href="{{ route('admin.users.index') }}" class="text-xl font-semibold">
                    Manage Users
                </a>
            </div>

            <!-- News Management Button -->
            <div class="bg-gray-800 text-white text-center p-6 rounded-lg shadow-lg hover:bg-gray-700 transition">
                <a href="{{ route('admin.news.index') }}" class="text-xl font-semibold">
                    Manage News
                </a>
            </div>

            <!-- FAQ Management Button -->
            <div class="bg-gray-800 text-white text-center p-6 rounded-lg shadow-lg hover:bg-gray-700 transition">
                <a href="{{ route('admin.faq.index') }}" class="text-xl font-semibold">
                    Manage FAQ
                </a>
            </div>

            <!-- Contacts Management Button -->
            <div class="bg-gray-800 text-white text-center p-6 rounded-lg shadow-lg hover:bg-gray-700 transition">
                <a href="{{ route('admin.contacts.index') }}" class="text-xl font-semibold">
                    Manage Contacts
                </a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>