<x-dashboard-layout>
    <x-slot:title>Create Post</x-slot:title>

    <div class="max-w-2xl mx-auto bg-white shadow-sm rounded-lg p-6">
        <h1 class="text-3xl font-bold text-black mb-6">Create New Post</h1>

        <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-black mb-2">Title <span
                        class="text-red-600">*</span></label>
                <input type="text" id="title" name="title" required value="{{ old('title') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                @error('title')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Category --}}
            <div>
                <label for="category_id" class="block text-sm font-medium text-black mb-2">Category <span
                        class="text-red-600">*</span></label>
                <select id="category_id" name="category_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Body --}}
            <div>
                <label for="body" class="block text-sm font-medium text-black mb-2">Content <span
                        class="text-red-600">*</span></label>
                <textarea id="body" name="body" rows="8" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">{{ old('body') }}</textarea>
                @error('body')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Image (optional) --}}
            <div>
                <label for="image" class="block text-sm font-medium text-black mb-2">Image</label>
                <input type="file" id="image" name="image"
                    class="block w-full text-sm text-gray-800 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                @error('image')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('dashboard.index') }}"
                    class="px-6 py-2 border border-gray-300 rounded-lg text-black hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</x-dashboard-layout>
