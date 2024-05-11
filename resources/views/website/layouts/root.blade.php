<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hima-Aksi FE Unsika</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class="h-full">
    <div class="bg-white">
        @include('website.partials.navbar')
        <main class="relative isolate px-6 pt-10 lg:px-8">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
