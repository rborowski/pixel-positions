@props(['mobile' => false])

<nav class="{{ $mobile ? 'space-y-4' : 'space-x-6' }} font-bold {{ $mobile ? '' : 'max-md:hidden' }}">
    <a href="/jobs" class="{{ $mobile ? 'block' : '' }}">Jobs</a>
    <a href="/tags" class="{{ $mobile ? 'block' : '' }}">Tags</a>
    <a href="/salaries" class="{{ $mobile ? 'block' : '' }}">Salaries</a>
    <a href="/employers" class="{{ $mobile ? 'block' : '' }}">Employers</a>
</nav>
