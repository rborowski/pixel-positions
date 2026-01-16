@props(['currencies', 'selected' => null])

<x-filters.dropdown
    name="currency"
    :options="$currencies"
    :selected="$selected"
    :exclude-params="['min', 'max']"
    all-label="All Currencies"
    min-width="120px"
/>
