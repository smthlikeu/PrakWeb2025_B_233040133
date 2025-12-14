<x-dashboard-layout>
    <x-slot:title>Categories</x-slot:title>

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-black">Manage Categories</h1>
            <a href="{{ route('admin.categories.create') }}"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Add Category
            </a>
        </div>

        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">No</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Color</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Posts</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-black">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-900">{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                        <td class="px-6 py-4 text-gray-900">{{ $category->name }}</td>
                        <td class="px-6 py-4">
                            <div class="w-8 h-8 rounded border" style="background-color: {{ $category->color }};">
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-900">{{ $category->posts_count }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.categories.show', $category) }}"
                                    class="text-blue-600 hover:underline">View</a>
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                    class="text-green-600 hover:underline">Edit</a>
                                @if ($category->posts_count == 0)
                                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="text-red-600 hover:underline">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                            No categories yet. <a href="{{ route('admin.categories.create') }}"
                                class="text-blue-600 hover:underline">Create one</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($categories->hasPages())
        <div class="mt-6">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
</x-dashboard-layout>