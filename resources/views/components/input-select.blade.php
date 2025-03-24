@props(['type'])
<select {{ $attributes->class(['form-select mb-3']) }}>
    <option value="">Select a {{ $type }}</option>
    {{ $slot }}
</select>
