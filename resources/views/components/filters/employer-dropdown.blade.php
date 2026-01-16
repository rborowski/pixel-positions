@props(['employers', 'selected' => null])

<x-filters.dropdown
    name="employer"
    :options="$employers"
    :selected="$selected"
    option-value="id"
    option-label="name"
    all-label="All Employers"
    min-width="150px"
/>
