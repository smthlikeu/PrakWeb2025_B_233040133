<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>
    <div class="max-w-md mx-auto bg-white shadow-sm rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-4 text-black">Halaman Register</h1>
        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm text-black mb-1">Name:</label>
                <input type="text" id="name" name="name" required
                    class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="email" class="block text-sm text-black mb-1">Email:</label>
                <input type="email" id="email" name="email" required
                    class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="password" class="block text-sm text-black mb-1">Password:</label>
                <input type="password" id="password" name="password" required
                    class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm text-black mb-1">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full border border-gray-300 rounded px-3 py-2" />
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Register</button>
            </div>
        </form>
    </div>
</x-layout>
