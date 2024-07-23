@props(['type'])
<select {{ $attributes->merge(['class' => 'form-select mb-3']) }}>
    <option value="">Select a {{ $type }}</option>
    {{ $slot }}
</select>
