<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pixel Positions')</title>
    @vite('resources/js/app.js')
</head>
<body class="bg-bgblack text-white h-full flex flex-col">

    <div class="px-10 flex flex-col flex-grow">
        @include('partials.header')

        <main class="mt-10 w-full max-w-[986px] mx-auto flex-grow">
            <div class="space-y-10 mb-5 w-full">
                @yield('content')
            </div>
        </main>

        @include('partials.footer')
    </div>
</body>
</html>
