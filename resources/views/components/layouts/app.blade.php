<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FreeLancer' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-[#070715] flex flex-col min-h-full text-[#C3C3D1]">
    <x-ui.navbar />
    <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 w-full py-[40px]">
        {{ $slot }}
    </main>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</body>

</html>