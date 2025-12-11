<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>

<body class="min-h-screen bg-white text-black flex flex-col">
    <nav class="bg-blue-600 shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center space-x-4">
                    <a href="/" class="px-3 py-2 text-white hover:text-blue-200 font-medium">Home</a>
                    <a href="/about" class="px-3 py-2 text-white hover:text-blue-200 font-medium">About</a>
                    <a href="/blog" class="px-3 py-2 text-white hover:text-blue-200 font-medium">Blog</a>
                    <a href="/posts" class="px-3 py-2 text-white hover:text-blue-200 font-medium">Posts</a>
                    <a href="/categories" class="px-3 py-2 text-white hover:text-blue-200 font-medium">Categories</a>
                    <a href="/contact" class="px-3 py-2 text-white hover:text-blue-200 font-medium">Contact</a>
                </div>
                <div class="flex items-center space-x-2">
                    @guest
                        <a href="/login" class="px-3 py-2 text-white hover:text-blue-200 font-medium">Login</a>
                        <a href="/register" class="px-3 py-2 text-white hover:text-blue-200 font-medium">Register</a>
                    @endguest
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="px-3 py-2 text-white hover:text-blue-200 font-medium">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8 grow">
        {{-- Flash / toast notifications --}}
        <div id="toast-container" class="fixed top-6 right-6 z-50"></div>

        {{ $slot }}
    </main>

    <footer class="bg-blue-600 mt-12 static text-center">
        <div class="container mx-auto px-4 py-6 text-sm text-white">
            <p>© 2025 Praktikum Web</p>
        </div>
    </footer>
    {{-- Toast script (shows session flashes and validation errors) --}}
    <script>
        (function() {
            const container = document.getElementById('toast-container');

            function showToast(message, type = 'success') {
                const colors = {
                    success: 'bg-green-600',
                    error: 'bg-red-600',
                    info: 'bg-blue-600'
                };
                const toast = document.createElement('div');
                toast.className = `max-w-sm text-white px-4 py-3 rounded shadow-md mb-4 ${colors[type] || colors.info}`;
                toast.textContent = message;
                container.appendChild(toast);
                setTimeout(() => {
                    toast.remove();
                }, 5000);
            }

            // Server-side flashes
            @if (session('success'))
                showToast(@json(session('success')), 'success');
            @endif
            @if (session('error'))
                showToast(@json(session('error')), 'error');
            @endif

            // Validation errors (show first)
            @if ($errors->any())
                showToast(@json($errors->first()), 'error');
            @endif
        })();
    </script>
</body>

</html>
