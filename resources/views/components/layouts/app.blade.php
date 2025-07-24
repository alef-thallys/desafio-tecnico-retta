<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Desafio Retta' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 font-sans antialiased">

<div class="min-h-screen">
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Análise de Despesas Parlamentares
            </h1>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>
</div>

@livewireScripts
</body>
</html>
