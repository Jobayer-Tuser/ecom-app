@props(['title'])

<div {{ $attributes }}>
    <div class="fs-12px text-muted mb-2"><b>{{ $title }}</b></div>
    {{ $slot }}
</div>
