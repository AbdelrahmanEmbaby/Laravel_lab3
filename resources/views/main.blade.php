<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Laravel Lab1</title>
</head>

<body class="bg-gray-900 text-white">
    @section('header')
    <header>
        <nav class="flex items-center justify-center p-6 font-black text-2xl">
            Laravel Lab1
        </nav>
    </header>
    @show

    <main class="w-full h-[calc(100vh-10rem)] flex justify-center items-center bg-red-900 text-4xl font-black">
        @yield('content')
    </main>

    @section('footer')
    <footer class="flex items-center justify-center p-6 font-black text-2xl">
        My First Laravel App
    </footer>
    @show
</body>

</html>