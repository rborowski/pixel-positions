<header class="flex justify-between items-center py-4 border-b border-white/10">
    <div>
        <a href="/">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
        </a>
    </div>

    @include('partials.navbar')

    @auth
        <div class="space-x-6 font-bold  items-center flex">
            <div class="inline-flex items-center gap-x-2">
                <span class="w-2 h-2 bg-blue-600 inline-block"></span>
                <a href="/jobs/create">Post a Job</a>
            </div>

            <form method="POST" action="/logout">
                @csrf
                @method('DELETE')
                <button class="cursor-pointer">Log out</button>
            </form>
        </div>
    @endauth

    @guest
        <div class="space-x-6 font-bold">
            <a href="/login">Log in</a>
            <a href="/register">Register</a>
        </div>
    @endguest

</header>
