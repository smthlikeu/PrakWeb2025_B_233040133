<x-dashboard-layout>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="max-w-3xl mx-auto">
        {{-- Post Header --}}
        <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
            <h1 class="text-4xl font-bold text-black mb-4">{{ $post->title }}</h1>

            <div class="flex items-center justify-between text-gray-600 text-sm mb-4">
                <div class="flex items-center gap-4">
                    <span>By {{ $post->author->name }}</span>
                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                </div>
                @if($post->category)
                    <span class="px-3 py-1 text-white rounded-full text-xs font-semibold" 
                        style="background-color: {{ $post->category->color }}">
                        {{ $post->category->name }}
                    </span>
                @endif
            </div>
        </div>

        {{-- Post Image & Content --}}
        <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
            @if ($post->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                        class="w-full max-h-96 object-cover rounded-lg border border-gray-200">
                </div>
            @endif

            <div class="prose prose-sm max-w-none text-gray-800 whitespace-pre-wrap">
                {{ $post->body }}
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex justify-between items-center">
            <a href="{{ route('dashboard.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-black hover:bg-gray-50">
                 Back
            </a>

            <div class="flex gap-2">
                <a href="{{ route('dashboard.edit', $post->slug) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Edit
                </a>

                <form method="POST" action="{{ route('dashboard.destroy', $post->slug) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')" 
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
