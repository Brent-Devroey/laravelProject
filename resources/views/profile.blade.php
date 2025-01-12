<x-app-layout>
    @section('title', 'Your Profile')

    <div class="container mx-auto my-8 p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center mb-6">
                @if($user->profile_picture)
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-48 h-48 object-cover mr-6">
                @else
                    <div class="w-48 h-48 bg-gray-300 flex items-center justify-center mr-6">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
                <div class="p-4">
                    <p class="text-2xl font-semibold">{{ $user->name }}</p>
                    <p class="text-xl text-gray-600">{{ $user->email }}</p>
                    <div class="mt-4">
                        <p class="text-lg font-semibold">Bio:</p>
                        <p class="text-gray-700">{{ $user->bio ?? 'Not provided' }}</p>
                    </div>
                    <div class="mt-4">
                        <p class="text-lg font-semibold">Date of Birth:</p>
                        <p class="text-gray-700">{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('F j, Y') : 'Not provided' }}</p>
                    </div>
                </div>
            </div>

            @if($recentBook)
                <div class="mt-6">
                    <h2 class="text-xl font-semibold">Most Recent Book</h2>
                    <div class="bg-white shadow-md rounded-lg p-4 mt-4">
                        <img src="{{ asset('storage/' . $recentBook->image) }}" alt="{{ $recentBook->title }}" class="w-auto h-48 object-cover rounded-md mb-4">
                        <h3 class="text-lg font-semibold">{{ $recentBook->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $recentBook->description }}</p>
                        <p class="mt-2 font-bold">Rating: {{ $recentBook->rating }}/5</p>
                    </div>
                </div>
            @endif

            @if (Auth::check() && Auth::id() == $user->id)
                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}" class="bg-blue-500 py-2 px-4 rounded hover:bg-blue-600 transition">Edit Profile</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
