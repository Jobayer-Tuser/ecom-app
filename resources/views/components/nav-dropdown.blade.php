@props(['title', 'icon', 'path'])

@php
$path = 'admin/'. $path;
$class = (request()->path() == $path) ? 'active' : '';
@endphp

<div {{ $attributes->class(['menu-item has-sub', 'active' => $class ]) }} >
    <a href="#" class="menu-link">
        <span class="menu-icon">
            <i class="{{ $icon }}"></i>
            <span class="menu-icon-label">6</span>
        </span>
        <span class="menu-text"> {{ $title }} </span>
        <span class="menu-caret"><b class="caret"></b></span>
    </a>
    {{ $slot }}
</div>
