<!doctype html>
<html class="h-full bg-gray-100" lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test case</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full">
<div class="min-h-full">
    <header class="bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-gray-900">Управление пользователями</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>


</body>
</html>
