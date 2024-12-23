<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar />

    <div class="container mx-auto my-8 p-4">
        <h1 class="text-3xl font-bold mb-6">Your Profile</h1>

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

            <div class="mt-6">
                <a href="{{ route('profile.edit') }}" class="bg-blue-500 py-2 px-4 rounded hover:bg-blue-600 transition">Edit Profile</a>
            </div>
        </div>
    </div>
</body>
</html>
