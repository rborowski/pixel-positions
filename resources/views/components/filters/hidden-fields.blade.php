@props(['except' => []])

@foreach(request()->except($except) as $key => $value)
    @if($value !== null && $value !== '')
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endif
@endforeach
