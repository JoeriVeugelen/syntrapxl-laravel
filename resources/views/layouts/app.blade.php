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
        <!-- Here you might include a navigation bar -->

        <main class="py-4">
            <div class="custom-container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>