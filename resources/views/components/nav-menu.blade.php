@props(['href', 'icon', 'active'])
@php
    $active = $active ? 'active' : '';
@endphp

<div {{ $attributes->class(["menu-item $active"]) }}>
    <a href="{{ $href }}" class="menu-link">
        <span class="menu-icon"><i class="{{ $icon }}"></i></span>
        <span class="menu-text">{{ $slot }}</span>
    </a>
</div>
