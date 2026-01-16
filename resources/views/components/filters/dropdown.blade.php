@props([
    'name',
    'options' => [],
    'selected' => null,
    'excludeParams' => [],
    'optionValue' => 'name',
    'optionLabel' => 'name',
    'allLabel' => 'All',
    'minWidth' => '150px'
])

<div class="relative">
    <x-forms.form method="GET" action="{{ route('jobs.index') }}" class="!max-w-none !mx-0 !space-y-0 inline">
        <x-filters.hidden-fields :except="array_merge([$name], $excludeParams)" />

        <x-forms.select :name="$name"  style="min-width: {{ $minWidth }}" onchange="this.form.submit()">
            <x-forms.option value="" :name="$name">{{ $allLabel }}</x-forms.option>
            @foreach($options as $option)
                @php
                    $value = data_get($option, $optionValue, $option);
                    $label = data_get($option, $optionLabel, $option);
                    $isSelected = $selected == $value;
                @endphp
                <x-forms.option :value="$value" :name="$name" :selected="$isSelected">
                    {{ $label }}
                </x-forms.option>
            @endforeach
        </x-forms.select>
    </x-forms.form>
</div>
