@php use App\Models\Salary; @endphp

@php
    $range = Salary::range(request('currency'));
@endphp
<div class="relative max-md:mx-auto">
    <x-forms.form method="GET" action="{{ route('jobs.index') }}"
                  class="!space-y-0 flex items-center" id="salary-form">
        <x-filters.hidden-fields :except="['currency', 'min', 'max']" />

        @if(request('currency'))
            <input type="hidden" name="currency" value="{{ request('currency') }}">
        @endif

        <x-forms.input
            type="number"
            name="min"
            :value="request('min') ?? $range['min']"
            :label="false"
            class="!w-24 !text-sm !px-3"
            placeholder="Min"
            :min="$range['min']"
            :max="$range['max']"
            oninput="debounceSalaryRange(this)"
        />
        <span class="text-gray-400 mx-1">-</span>
        <x-forms.input
            type="number"
            name="max"
            :value="request('max') ?? $range['max']"
            :label="false"
            class="!w-24 !text-sm !px-3"
            placeholder="Max"
            :min="$range['min']"
            :max="$range['max']"
            oninput="debounceSalaryRange(this)"
        />
    </x-forms.form>
</div>


<script>
let salaryRangeTimeout;

function debounceSalaryRange(input) {
    clearTimeout(salaryRangeTimeout);
    salaryRangeTimeout = setTimeout(() => validateSalaryRange(input), 700);
}

function validateSalaryRange(input) {
    const form = input.closest('form');
    const minInput = form.querySelector('input[name="min"]');
    const maxInput = form.querySelector('input[name="max"]');
    const min = parseFloat(minInput.value);
    const max = parseFloat(maxInput.value);

    minInput.setCustomValidity('');
    maxInput.setCustomValidity('');

    if (!isNaN(min) && !isNaN(max) && min > max) {
        (input.name === 'min' ? minInput : maxInput).setCustomValidity('Minimum cannot be greater than maximum');
    }

    form.checkValidity() ? form.submit() : form.reportValidity();
}
</script>
