<header class="flex justify-between items-center py-4 border-b border-white/10">
    <div>
        <a href="/">
            <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
        </a>
    </div>

    @include('partials.navbar')

    @auth
        <div class="space-x-6 font-bold flex">
            <a href="/jobs/create">Post a Job</a>

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
