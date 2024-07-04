<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hima-Aksi FE Unsika</title>

    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body class="bg-gray-100">
    @include('components.alert')

    @include('website.partials.navbar')
    <main class="relative isolate pt-10">
        @yield('content')
    </main>
    @include('website.partials.footer')

    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
</body>

</html>
