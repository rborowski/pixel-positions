@props(['mobile' => false])

@auth
    <div class="{{ $mobile ? 'space-y-4' : 'space-x-6' }} font-bold {{ $mobile ? '' : 'items-center flex' }}">
        <div class="inline-flex items-center gap-x-2">
            <span class="w-2 h-2 bg-blue-600 inline-block"></span>
            <a href="/jobs/create" class="{{ $mobile ? 'block' : '' }}">Post a Job</a>
        </div>

        <form method="POST" action="/logout">
            @csrf
            @method('DELETE')
            <button class="cursor-pointer {{ $mobile ? 'text-left block' : '' }}">Log out</button>
        </form>
    </div>
@endauth

@guest
    <div class="{{ $mobile ? 'space-y-4' : 'space-x-6' }} font-bold">
        <a href="/login" class="{{ $mobile ? 'block' : '' }}">Log in</a>
        <a href="/register" class="{{ $mobile ? 'block' : '' }}">Register</a>
    </div>
@endguest
