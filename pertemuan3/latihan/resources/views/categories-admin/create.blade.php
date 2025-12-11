<x-dashboard-layout>
    <x-slot:title>Create Category</x-slot:title>

    <div class="max-w-2xl mx-auto bg-white shadow-sm rounded-lg p-6">
        <h1 class="text-3xl font-bold text-black mb-6">Create New Category</h1>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-black mb-2">Name <span
                        class="text-red-600">*</span></label>
                <input type="text" id="name" name="name" required value="{{ old('name') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Color --}}
            <div>
                <label for="color" class="block text-sm font-medium text-black mb-2">Color <span
                        class="text-red-600">*</span></label>
                <div class="flex items-center gap-4">
                    <input type="color" id="color" name="color" required value="{{ old('color', '#3b82f6') }}"
                        class="w-20 h-12 border border-gray-300 rounded-lg cursor-pointer">
                    <input type="text" id="color-text" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg"
                        value="{{ old('color', '#3b82f6') }}" readonly>
                </div>
                @error('color')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.categories.index') }}"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-black hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Create Category
                </button>
            </div>
        </form>
    </div>

    <script>
        const colorInput = document.getElementById('color');
        const colorText = document.getElementById('color-text');
        colorInput.addEventListener('change', (e) => {
            colorText.value = e.target.value;
        });
    </script>
</x-dashboard-layout>
