<x-app-layout>
    <x-slot:title>All Posts</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold text-black mb-8">All Posts</h1>

        @if ($posts->count() > 0)
            <div class="space-y-6 mb-8">
                @foreach ($posts as $post)
                    <div class="bg-white shadow-sm rounded-lg p-6 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h2 class="text-2xl font-bold text-black mb-2">
                                    <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-blue-600">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <p class="text-gray-600 text-sm">
                                    By {{ $post->author->name }} • {{ $post->created_at->format('M d, Y') }}
                                </p>
                            </div>
                            @if ($post->category)
                                <span class="px-3 py-1 text-white rounded-full text-xs font-semibold"
                                    style="background-color: {{ $post->category->color }}">
                                    {{ $post->category->name }}
                                </span>
                            @endif
                        </div>

                        <p class="text-gray-700 line-clamp-3 mb-4">
                            {{ Str::limit($post->body, 200) }}
                        </p>

                        <a href="{{ route('posts.show', $post->slug) }}"
                            class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Read More
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @else
            <div class="bg-white rounded-lg p-12 text-center border border-gray-300">
                <p class="text-gray-600 text-lg">No posts found.</p>
            </div>
        @endif
    </div>
</x-app-layout>
