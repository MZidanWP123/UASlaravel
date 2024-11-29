<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Index</title>
</head>

<body class="h-full">



    <div class="min-h-full">
        <x-drawer>
            <x-navbar-v2 />
            <!-- Main content -->
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1>Welcome to AbsensiApp</h1>
            </div>

            <main>
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>

            <x-footer></x-footer> --}}
        </x-drawer>


        {{-- <x-navbar-v2></x-navbar-v2>

        <x-header>
            {{ $judul }} YEYEY
        </x-header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

        <x-footer></x-footer> --}}
    </div>

</body>

</html>
