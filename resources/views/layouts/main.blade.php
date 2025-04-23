<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Laravel Lab1</title>
</head>

<body class="font-[poppins]">
    @include('layouts.nav')

    <main>
        @yield('content')
    </main>
</body>

</html>