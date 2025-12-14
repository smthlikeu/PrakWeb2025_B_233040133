<x-app-layout>
    <x-slot:title>Categories</x-slot:title>

    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold mb-8 text-gray-900">All Categories</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($categories as $category)
            <a href="/categories/{{ $category->slug }}"
                class="group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border-2 hover:scale-105"
                style="border-color: {{ $category->color }};">

                <div class="p-8">
                    <!-- Category Icon/Badge -->
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mb-4 mx-auto"
                        style="background-color: {{ $category->color }}20;">
                        <svg class="w-8 h-8" style="color: {{ $category->color }};" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>

                    <!-- Category Name -->
                    <h2 class="text-2xl font-bold text-center mb-3 group-hover:text-blue-600 transition-colors"
                        style="color: {{ $category->color }};">
                        {{ $category->name }}
                    </h2>

                    <!-- Posts Count -->
                    <div class="text-center">
                        <p class="text-gray-600 text-sm mb-1">Total Posts</p>
                        <p class="text-3xl font-bold text-gray-900">
                            {{ $category->posts_count }}
                        </p>
                    </div>

                    <!-- View Button -->
                    <div class="mt-6 text-center">
                        <span
                            class="inline-flex items-center text-sm font-medium group-hover:text-blue-600 transition-colors"
                            style="color: {{ $category->color }};">
                            View posts
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full bg-white rounded-lg p-12 text-center border border-gray-300">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                <p class="text-gray-600 text-lg">No categories found.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>