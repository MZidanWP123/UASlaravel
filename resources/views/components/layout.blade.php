<!DOCTYPE html>
<html data-theme="bumblebee" lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Index</title>

    {{-- Remix icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

</head>

<body class="h-full">



    <div class="min-h-screen flex flex-col">
        <x-drawer>
            <x-navbar-v2 />

            <x-header>
                {{ $judul }}
            </x-header>

            <!-- Main content -->
            <main class="flex-grow">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>

            {{-- <x-footer></x-footer> --}}
        </x-drawer>

    </div>

</body>

</html>
