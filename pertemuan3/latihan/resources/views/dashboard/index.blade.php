<x-dashboard-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-black mb-4">Welcome, {{ auth()->user()->name }}</h1>

        {{-- Search Bar & Add Post Button --}}
        <div class="flex items-center justify-between gap-4 mb-6">
            <form method="GET" action="{{ route('dashboard.index') }}" class="flex-1">
                <input type="text" name="search" placeholder="Search posts..." value="{{ request('search') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-black placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-600">
            </form>
            <a href="{{ route('dashboard.create') }}"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">Add Post</a>
        </div>
    </div>

    @include('components.table')
</x-dashboard-layout>
