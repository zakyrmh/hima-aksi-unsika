<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/logo.png') }}" type="image/x-icon">
</head>

<body class="h-full bg-white">
    <div class="min-h-full">
        @include('dashboard.partials.navigation')
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleButton');
            const dropdown = document.getElementById('dropdown');

            toggleButton.addEventListener('click', function() {
                dropdown.classList.toggle('hidden');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('hamburger');
            const dropdown = document.getElementById('mobile-menu');

            toggleButton.addEventListener('click', function() {
                dropdown.classList.toggle('hidden');
            });
        });
    </script>
</body>

</html>
