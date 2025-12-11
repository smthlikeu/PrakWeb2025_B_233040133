<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Blog' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</head>

<body class="bg-white text-gray-800">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow-md sticky top-0 z-40">
        <div class="mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold hover:text-blue-100 shrink-0">Blog</a>

            <!-- Center Navigation -->
            <div class="flex gap-8 items-center flex-1 justify-center">
                <a href="/" class="hover:text-blue-100 transition-colors text-sm">Home</a>
                <a href="/about" class="hover:text-blue-100 transition-colors text-sm">About</a>
                <a href="/blog" class="hover:text-blue-100 transition-colors text-sm">Blog</a>
                <a href="/posts" class="hover:text-blue-100 transition-colors text-sm">Posts</a>
                <a href="/categories" class="hover:text-blue-100 transition-colors text-sm">Categories</a>
                <a href="/contact" class="hover:text-blue-100 transition-colors text-sm">Contact</a>
            </div>

            <!-- Right Side - Auth or Login/Register -->
            @auth
                <!-- User Profile Dropdown -->
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

                        <!-- Menu Items -->
                        <a href="/dashboard"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-gray-100 transition-colors text-sm">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4V3">
                                </path>
                            </svg>
                            <span>Dashboard Saya</span>
                        </a>

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
            @else
                <div class="flex gap-4 shrink-0">
                    <a href="/login" class="px-4 py-2 text-sm hover:text-blue-100 transition-colors">Login</a>
                    <a href="/register"
                        class="px-4 py-2 bg-blue-700 rounded-lg text-sm hover:bg-blue-800 transition-colors">Register</a>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8 min-h-screen">
        {{ $slot }}
    </main>

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
    <footer class="bg-blue-600 text-white text-center py-4 mt-8">
        <p>&copy; 2025 My Blog. All rights reserved.</p>
    </footer>
</body>

</html>
