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
    @yield('content')
    <script>
        function togglePassword(passwordId, showIconId, hideIconId) {
            const passwordInput = document.getElementById(passwordId);
            const showIcon = document.getElementById(showIconId);
            const hideIcon = document.getElementById(hideIconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showIcon.classList.add('hidden');
                hideIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                showIcon.classList.remove('hidden');
                hideIcon.classList.add('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const alertMessage = document.getElementById('alertMessage');
            const closeBtn = document.getElementById('closeBtn');

            // Tampilkan alert message saat halaman dimuat
            alertMessage.classList.remove('hidden');

            // Atur timeout untuk menghilangkan alert setelah 5 detik
            setTimeout(function() {
                hideAlert();
            }, 5000);

            // Tambahkan event listener pada tombol close
            closeBtn.addEventListener('click', function() {
                hideAlert();
            });

            // Fungsi untuk menyembunyikan alert
            function hideAlert() {
                alertMessage.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
