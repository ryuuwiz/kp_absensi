<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{asset("favicon.png")}}" type="image/x-icon">

        <title>Sistem Absensi Siswa</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
    <div class="flex flex-col items-center justify-center min-h-screen py-12 bg-gray-100">
        <div class="w-full max-w-md p-20 bg-white rounded-lg shadow-md">
            <img src="{{asset("logo.png")}}" class="w-1/3 mb-6 mx-auto" alt="Logo">
            <h2 class="mb-6 text-2xl font-bold text-center text-emerald-600">
                Sistem Absensi Siswa
            </h2>
            <p class="mb-5 text-lg">Saya ingin masuk sebagai</p>
            <a href="/admin" class="inline-block bg-emerald-500 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded w-full mb-4 text-center">
                Admin
            </a>
            <a href="/guru" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full mb-4 text-center">
                Guru
            </a>
        </div>
    </div>
    </body>
</html>

