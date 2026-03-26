<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ዜማ ቤት') }} - Login</title>

        <!-- Favicon -->
        <link rel="icon" type="image/jpg" href="{{ asset('images/icon-begena.jpg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Noto+Sans+Ethiopic:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .ancient-bg {
                background-image: url('{{ asset('images/begena-page-2.jpg') }}');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased font-['Noto_Sans_Ethiopic'] ancient-bg">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="absolute inset-0 bg-stone-900/70 backdrop-blur-[2px]"></div>

            <div class="relative z-10">
                <a href="/" class="block text-center mb-8">
                    <div class="bg-amber-100/90 backdrop-blur-md p-4 rounded-2xl shadow-2xl border border-amber-200">
                        <h1 class="text-3xl md:text-4xl font-black text-amber-900 mb-2">ዜማ ቤት</h1>
                        <p class="text-amber-800 font-medium">Ancient Ethiopian Music Academy</p>
                    </div>
                </a>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-6 py-4 bg-amber-50/95 backdrop-blur-md shadow-2xl overflow-hidden sm:rounded-2xl border border-amber-200">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
