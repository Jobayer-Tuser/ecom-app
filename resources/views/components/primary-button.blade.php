@props(['value'])
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary btn-lg d-block w-100 fw-500 mb-3']) }}>
    {{ $value ?? $slot }}
</button>

