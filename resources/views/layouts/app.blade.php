<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pixel Positions')</title>
    @vite('resources/js/app.js')
</head>
<body class="bg-bgblack text-white">

    <div class="px-10">
        @include('partials.header')

        <main class="mt-10 max-w-[986px] mx-auto">
            <div class="space-y-10 mb-5">
                @yield('content')
            </div>
        </main>

        @include('partials.footer')
    </div>
</body>
</html>
