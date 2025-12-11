<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <!-- Top Navbar -->
    <nav class="bg-blue-600 text-white shadow-md sticky top-0 z-40">
        <div class="px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold hover:text-blue-100 shrink-0">Blog</a>

            <!-- Right Side - User Profile Dropdown -->
            @auth
                <div class="relative group shrink-0">
                    <button class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <div class="w-8 h-8 bg-blue-700 rounded-full flex items-center justify-center text-sm font-bold">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <span class="text-sm">{{ auth()->user()->name }}</span>
                        <svg class="w-3 h-3 ml-1 transition-transform group-hover:rotate-180" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        class="absolute right-0 mt-2 w-56 bg-white text-gray-800 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                        <!-- User Info -->
                        <div class="px-4 py-4 border-b border-gray-200">
                            <p class="font-semibold text-black text-sm">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-600 break-all">{{ auth()->user()->email }}</p>
                        </div>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit"
                                class="w-full text-left flex items-center gap-3 px-4 py-3 hover:bg-gray-100 transition-colors text-red-600 font-semibold text-sm">
                                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-700 text-white shadow-lg overflow-y-auto">
            <div class="p-6">
                <h2 class="text-lg font-bold mb-8">Menu Dashboard</h2>

                <nav class="space-y-2">
                    <!-- Posts Menu -->
                    <div>
                        <details class="group">
                            <summary
                                class="flex items-center justify-between cursor-pointer px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors font-medium">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v11m-5-5l-5 5m0 0l5 5m-5-5h12.5">
                                        </path>
                                    </svg>
                                    Postingan
                                </span>
                                <svg class="w-4 h-4 transition-transform group-open:rotate-180" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </summary>

                            <div class="pl-8 space-y-2 mt-2">
                                <a href="/dashboard"
                                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                    Daftar Postingan
                                </a>
                                <a href="/dashboard/create"
                                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Buat Postingan
                                </a>
                            </div>
                        </details>
                    </div>

                    <!-- Categories Menu -->
                    <div>
                        <details class="group">
                            <summary
                                class="flex items-center justify-between cursor-pointer px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors font-medium">
                                <span class="flex items-center gap-3">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                        </path>
                                    </svg>
                                    Kategori
                                </span>
                                <svg class="w-4 h-4 transition-transform group-open:rotate-180" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </summary>

                            <div class="pl-8 space-y-2 mt-2">
                                <a href="/admin/categories"
                                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                    Daftar Kategori
                                </a>
                                <a href="/admin/categories/create"
                                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Buat Kategori
                                </a>
                            </div>
                        </details>
                    </div>

                    <!-- Back to Blog -->
                    <a href="/"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-blue-600 transition-colors font-medium mt-6">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Blog
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto bg-gray-50">
            <div class="p-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="hidden fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
    </div>

    <script>
        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.remove('hidden');
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }

        @if (session('success'))
            showToast('{{ session('success') }}');
        @endif
    </script>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4 border-t border-blue-700">
        <p>&copy; 2025 My Blog. All rights reserved.</p>
    </footer>
</body>

</html>
