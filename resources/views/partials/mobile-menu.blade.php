<div id="mobile-menu" class="hidden absolute top-full left-0 right-0 bg-bgblack border-b border-white/10 md:hidden z-50">
    <div class="px-10 py-6 space-y-4">
        @include('partials.navbar', ['mobile' => true])

        <div class="border-t border-white/10 pt-4">
            <x-auth-buttons mobile="true" />
        </div>
    </div>
</div>
