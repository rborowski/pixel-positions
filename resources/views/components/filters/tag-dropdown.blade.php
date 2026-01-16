@props(['tags', 'selected' => null])

<x-filters.dropdown
    name="tag"
    :options="$tags"
    :selected="$selected"
    option-value="name"
    option-label="name"
    all-label="All Tags"
    min-width="150px"
/>
