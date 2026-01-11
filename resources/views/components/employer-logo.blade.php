@props([
    'width' => 100,
    'height' => 100,
])

<img class="rounded-xl " src="http://picsum.photos/seed/{{ rand(0, 100) }}/{{ $width }}/{{ $height }}" alt="">
