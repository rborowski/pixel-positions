<section class="text-center pt-6 w-full">
    <h1 class="text-center font-bold text-4xl ">Let's Find Your Next Job</h1>

    <x-forms.form action="/jobs" class="mt-6 w-full">
        <x-forms.input :label="false" name="q" placeholder="Web Developer..." :value="request('q')"/>
        
        @foreach(request()->except('q') as $key => $value)
            @if($value !== null && $value !== '')
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach
    </x-forms.form>

</section>
