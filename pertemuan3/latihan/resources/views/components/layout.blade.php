<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-gray-100 min-h-screen">
    <nav class="bg-gray-800 text-gray-100 p-4 shadow-lg">
        <div class="container mx-auto flex gap-6">
            <a href="/" class="hover:text-gray-300 font-semibold">Home</a>
            <a href="/about" class="hover:text-gray-300 font-semibold">About</a>
            <a href="/blog" class="hover:text-gray-300 font-semibold">Blog</a>
            <a href="/contact" class="hover:text-gray-300 font-semibold">Contact</a>
        </div>
    </nav>
    

    <main class="container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <div class="h-16"></div>
    <footer class="fixed bottom-0 left-0 w-full bg-gray-800 text-gray-200 text-center p-4 border-t border-gray-700">
        <p>&copy; 2025 Laravel Praktikum</p>
    </footer>
</body>

</html>
