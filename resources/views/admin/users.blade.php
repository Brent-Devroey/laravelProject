<x-app-layout>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Manage Users</h1>

        <div class="flex space-x-6">
            <form action="{{ route('admin.users.store') }}" method="POST" class="mb-6 p-4 border border-gray-300 rounded-lg shadow-md bg-gray-50 w-full mr-6">
                @csrf
                <h2 class="text-xl font-semibold mb-4">Create New User</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium">Name</label>
                        <input type="text" name="name" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium">Password</label>
                        <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
                    </div>
                </div>
                <button type="submit" class="mt-4 bg-green-500 text-black rounded-full px-6 py-2 hover:bg-green-600">Create User</button>
            </form>

            <div class="w-full">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select name="is_admin" class="px-8 border rounded">
                                            <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>User</option>
                                            <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        <button type="submit" class="bg-blue-500 text-white rounded-full p-2 mt-2">Update</button>
                                    </form>
                                </td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
