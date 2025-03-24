@props(['active'])
@php
    $active = $active ? 'active' : '';
@endphp

<a {{ $attributes->class(["menu-link $active"]) }}>
    <span class="menu-text">{{ $slot }}</span>
</a>
