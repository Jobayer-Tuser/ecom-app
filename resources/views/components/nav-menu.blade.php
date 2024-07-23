@props(['href', 'icon', 'path'])
@php
$path = 'admin/' . $path;
    $class = (request()->path() == $path) ? 'active' : '';
@endphp

<div {{ $attributes->class(['menu-item', 'active' => $class ]) }}>
    <a href="{{ $href }}" class="menu-link">
        <span class="menu-icon"><i class="{{ $icon }}"></i></span>
        <span class="menu-text">{{ $slot }}</span>
    </a>
</div>
