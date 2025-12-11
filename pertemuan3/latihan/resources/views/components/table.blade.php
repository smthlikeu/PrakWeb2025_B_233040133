<div class="relative overflow-x-auto bg-white shadow-sm rounded-lg border border-gray-200">
    <table class="w-full text-sm text-left rtl:text-right text-gray-700">
        <thead class="text-sm bg-gray-50 border-b border-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    No
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Category
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Published At
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                    <td class="px-6 py-4 text-gray-900">
                        {{ $posts->firstItem() + $loop->index }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $post->title }}
                    </th>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $post->category->name ?? 'Uncategorized' }}
                    </td>
                    <td class="px-6 py-4 text-gray-700">
                        {{ $post->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('dashboard.show', $post->slug) }}"
                                class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('dashboard.edit', $post->slug) }}"
                                class="text-green-600 hover:underline">Edit</a>
                            <form method="POST" action="{{ route('dashboard.destroy', $post->slug) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        No posts yet. <a href="{{ route('dashboard.create') }}"
                            class="text-blue-600 hover:underline">Create one</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Flowbite Pagination --}}
@if ($posts->hasPages())
    <nav aria-label="Page navigation example" class="mt-6 flex justify-center">
        <ul class="flex items-center -space-x-px h-10 text-base">
            {{-- Previous Button --}}
            @if ($posts->onFirstPage())
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg cursor-not-allowed">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ $posts->previousPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                        <span class="sr-only">Previous</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                    </a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                @if ($page == $posts->currentPage())
                    <li>
                        <a href="#" aria-current="page"
                            class="flex items-center justify-center px-4 h-10 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">
                            {{ $page }}
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ $url }}"
                            class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">
                            {{ $page }}
                        </a>
                    </li>
                @endif
            @endforeach

            {{-- Next Button --}}
            @if ($posts->hasMorePages())
                <li>
                    <a href="{{ $posts->nextPageUrl() }}"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
            @else
                <li>
                    <a href="#"
                        class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg cursor-not-allowed">
                        <span class="sr-only">Next</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
