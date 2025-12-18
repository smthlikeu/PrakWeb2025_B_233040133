<x-app-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="max-w-3xl mx-auto">
        <!-- Post Header -->
        <article class="bg-white shadow-sm rounded-lg p-8 mb-6">
            <h1 class="text-4xl font-bold text-black mb-4">{{ $post->title }}</h1>

            <div class="flex items-center justify-between text-gray-600 text-sm mb-6 pb-6 border-b border-gray-200">
                <div class="flex items-center gap-4">
                    <span>By <strong>{{ $post->author->name }}</strong></span>
                    <span>{{ $post->created_at->format('F d, Y') }}</span>
                </div>
                @if ($post->category)
                    <span class="px-4 py-1 text-white rounded-full text-sm font-semibold"
                        style="background-color: {{ $post->category->color }}">
                        {{ $post->category->name }}
                    </span>
                @endif
            </div>

            <!-- Post Content -->
            <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                <div class="whitespace-pre-wrap">{{ $post->body }}</div>
            </div>
        </article>

        <!-- Back Button -->
        <div class="flex gap-3">
            <a href="{{ route('posts.index') }}" class="px-6 py-2 bg-gray-200 text-black rounded-lg hover:bg-gray-300">
                ← Back to Blog
            </a>
        </div>
    </div>
</x-app-layout>
