<x-app-layout>
    <x-slot:title>Blog</x-slot:title>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex items-center justify-between mb-8">
            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-blue-600 mb-1">Blog</p>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Artikel Terbaru</h1>
                <p class="mt-2 text-sm text-gray-500">Kumpulan artikel pilihan seputar teknologi, pemrograman, dan web
                    development.</p>
            </div>
        </div>

        @if ($posts->count() > 0)
        <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($posts as $post)
            <article
                class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col">
                {{-- Image --}}
                <div class="relative h-44 md:h-48 w-full overflow-hidden">
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                        class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                    @else
                    <div
                        class="w-full h-full bg-gradient-to-tr from-blue-500 via-indigo-500 to-purple-500 flex items-center justify-center text-white text-xl font-semibold">
                        {{ Str::limit($post->title, 24) }}
                    </div>
                    @endif
                </div>

                {{-- Content --}}
                <div class="flex-1 flex flex-col p-6 space-y-3">
                    @if ($post->category)
                    <span class="inline-flex items-center text-xs font-semibold text-white px-3 py-1 rounded-full w-max"
                        style="background-color: {{ $post->category->color }}">
                        {{ $post->category->name }}
                    </span>
                    @endif

                    <h2 class="text-xl font-bold text-gray-900 leading-snug">
                        <a href="{{ route('posts.show', $post->slug) }}"
                            class="hover:text-blue-600 transition-colors">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <p class="text-sm text-gray-600 line-clamp-3">
                        {{ $post->excerpt ?? Str::limit(strip_tags($post->body), 160) }}
                    </p>

                    {{-- Author & Meta --}}
                    <div class="flex items-center justify-between pt-4 mt-auto border-t border-gray-100">
                        <div class="flex items-center gap-3">
                            <div
                                class="h-9 w-9 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs font-semibold">
                                {{ Str::upper(Str::substr($post->author->name, 0, 2)) }}
                            </div>
                            <div class="text-xs text-gray-500 leading-tight">
                                <p class="font-semibold text-gray-800">{{ $post->author->name }}</p>
                                <p>{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <a href="{{ route('posts.show', $post->slug) }}"
                            class="inline-flex items-center text-xs font-semibold text-blue-600 hover:text-blue-700">
                            Baca selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
        @else
        <div
            class="mt-12 bg-white rounded-2xl border border-dashed border-gray-300 px-10 py-16 text-center text-gray-500">
            <h3 class="text-lg font-semibold mb-2">Belum ada artikel</h3>
            <p class="text-sm">Silakan tambahkan post baru melalui dashboard untuk mulai mengisi blog.</p>
        </div>
        @endif
    </div>
</x-app-layout>