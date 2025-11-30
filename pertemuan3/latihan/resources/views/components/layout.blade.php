<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')
  <title>{{ $title }}</title>
</head>

<body class="min-h-screen bg-gray-900 text-white flex flex-col">
  <nav class="bg-gray-800 shadow-md">
    <div class="container mx-auto px-4">
      <div class="flex items-center justify-between h-16">
        <div class="flex space-x-4">
          <a href="/" class="px-3 py-2 text-white hover:text-blue-500 font-medium">Home</a>
          <a href="/about" class="px-3 py-2 text-white hover:text-blue-500 font-medium">About</a>
          <a href="/blog" class="px-3 py-2 text-white hover:text-blue-500 font-medium">Blog</a>
          <a href="/contact" class="px-3 py-2 text-white hover:text-blue-500 font-medium">Contact</a>
          <a href="/posts" class="px-3 py-2 text-white hover:text-blue-500 font-medium">Posts</a>
          <a href="/categories" class="px-3 py-2 text-white hover:text-blue-500 font-medium">Categories</a>
        </div>
      </div>
    </div>
  </nav>

  <main class="container mx-auto px-4 py-8 grow">
    {{ $slot }}
  </main>

  <footer class="bg-gray-800 border-t border-gray-700 mt-12 static text-center">
    <div class="container mx-auto px-4 py-6 text-sm text-gray-400">
      <p>© 2025 Praktikum Web</p>
    </div>
  </footer>
</body>

</html>
