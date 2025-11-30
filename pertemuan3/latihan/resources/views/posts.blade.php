<x-layout>
    <x-slot:title>Posts</x-slot:title>

    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-8 text-white">All Blog Posts</h1>

        <div class="space-y-6">
            @forelse ($posts as $post)
                <article
                    class="bg-gray-800 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-700">
                    <div class="p-6">
                        <!-- Title -->
                        <h2 class="text-2xl font-bold mb-3">
                            <a href="/posts/{{ $post->slug }}" class="text-white hover:text-blue-400 transition-colors">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <!-- Meta Info -->
                        <div class="flex flex-wrap items-center gap-4 mb-4 text-sm text-gray-400">
                            <!-- Category Badge -->
                            @if ($post->category)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-white font-medium"
                                    style="background-color: {{ $post->category->color }};">
                                    {{ $post->category->name }}
                                </span>
                            @endif

                            <!-- Author -->
                            @if ($post->user)
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    {{ $post->user->name }}
                                </span>
                            @endif

                            <!-- Date -->
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <!-- Excerpt -->
                        <p class="text-gray-300 leading-relaxed mb-4">
                            {{ Str::limit($post->body, 200) }}
                        </p>

                        <!-- Read More Link -->
                        <a href="/posts/{{ $post->slug }}"
                            class="inline-flex items-center text-blue-400 hover:text-blue-300 font-medium transition-colors">
                            Read more
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class="bg-gray-800 rounded-lg p-12 text-center border border-gray-700">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-gray-400 text-lg">No posts found.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
