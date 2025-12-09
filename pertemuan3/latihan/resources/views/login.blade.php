<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>
    <div class="max-w-md mx-auto bg-white shadow-sm rounded-lg p-6">
        <h1 class="text-2xl font-semibold mb-4 text-black">Halaman Login</h1>
        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
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
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
            </div>
        </form>
    </div>
</x-layout>
