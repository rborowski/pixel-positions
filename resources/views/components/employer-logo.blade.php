@props([
    'employer',
    'width' => 100,
])

<img class="rounded-xl " src="{{ asset($employer->logo) }}"  width="{{$width}}" alt="">
