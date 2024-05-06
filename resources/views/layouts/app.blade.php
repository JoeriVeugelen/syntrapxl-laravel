<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Syntra PXL') }}</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="bg-[#f4f4f4]">
    <div id="app">

        <nav class="w-full bg-white py-2 border-gray-200 border-b">
            <div class="w-full h-8 custom-container">
                <div class="flex justify-between flex-row w-full">
                    <div class="h-8">
                        <a href="/courses">
                            <img class="object-contain h-full" src="{{ asset('logo-syntra.svg') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a class="text-[10px] uppercase" href="/courses">Cursussen</a>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div>
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
