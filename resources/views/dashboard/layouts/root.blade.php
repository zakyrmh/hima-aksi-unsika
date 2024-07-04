<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hima-Aksi FE Unsika</title>

    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="/richtexteditor/rte_theme_default.css" />
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
        }
    </style>
</head>

<body class="h-full">
    @include('components.alert')

    <div class="min-h-full">
        @include('dashboard.partials.navbar')

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>



    <script src="{{ asset('assets/js/scriptDashboard.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script src="{{ asset('assets/js/imagePreview.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                // Set the editor data to the existing content from the database
                editor.setData(document.querySelector('#body').value);

                // Update the hidden input whenever the editor content changes
                editor.model.document.on('change:data', () => {
                    document.querySelector('#body').value = editor.getData();
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>
