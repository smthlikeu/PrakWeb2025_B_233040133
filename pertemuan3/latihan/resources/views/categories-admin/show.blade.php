<x-dashboard-layout>
    <x-slot:title>{{ $category->name }}</x-slot:title>

    <div class="max-w-4xl mx-auto">
        {{-- Category Header --}}
        <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h1 class="text-3xl font-bold text-black">{{ $category->name }}</h1>
                    <div class="flex items-center gap-3 mt-2">
                        <div style="background-color: {{ $category->color }}"
                            class="w-8 h-8 rounded-full border border-gray-300"></div>
                        <span class="text-gray-600">{{ $category->color }}</span>
                    </div>
                </div>
                <div class="text-right text-gray-600">
                    <p class="text-sm">Posts: <span class="font-bold text-black">{{ $category->posts_count ?? 0 }}</span>
                    </p>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.categories.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-black hover:bg-gray-50">
                    Back
                </a>
                <a href="{{ route('admin.categories.edit', $category) }}"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Edit
                </a>
                @if ($category->posts_count == 0)
                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this category?')"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        </div>

        {{-- Posts in Category --}}
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h2 class="text-2xl font-bold text-black mb-4">Posts in this Category</h2>

            @if ($category->posts->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100 border-b border-gray-300">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-black">No</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-black">Title</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-black">Author</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-black">Published</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-black">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->posts as $post)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 text-sm text-black font-medium">{{ $post->title }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $post->author->name }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-700">
                                        {{ $post->created_at->format('M d, Y') }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <a href="{{ route('posts.show', $post->slug) }}"
                                            class="text-blue-600 hover:underline">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-600 text-center py-8">No posts in this category yet.</p>
            @endif
        </div>
    </div>
</x-dashboard-layout>
