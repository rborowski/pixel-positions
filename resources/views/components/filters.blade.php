@props(['tags' => [], 'employers' => [], 'currencies' => []])

<div class="flex justify-center w-full max-md:flex-col  md:space-x-2 max-md:space-y-2">
    <x-filters.salary-range />

    <x-filters.currency-dropdown
        :currencies="$currencies"
        :selected="request('currency')"
    />

    <x-filters.tag-dropdown
        :tags="$tags"
        :selected="request('tag')"
    />

    <x-filters.employer-dropdown
        :employers="$employers"
        :selected="request('employer')"
    />
</div>
