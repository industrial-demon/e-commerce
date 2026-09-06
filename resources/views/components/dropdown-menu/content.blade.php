@props ([
    'align' => 'end',
    'side' => 'bottom',
    'sideOffset' => '8px',
    'collisionPadding' => '8px',
    'width' => '12rem',
])

<template x-teleport="body">
    <div
        x-ref="content"
        x-show="open"
        x-cloak
        x-transition.scale.opacity.origin.top.right
        x-init="setFloatingOptions({
            side: '{{ $side }}',
            align: '{{ $align }}',
            sideOffset: '{{ $sideOffset }}',
            collisionPadding: '{{ $collisionPadding }}',
        })"
        x-bind:style="floatingStyle + ' width: {{ $width }};'"
        x-on:click.outside="closeMenu()"
        x-on:keydown.tab="closeMenu()"
        role="menu"
        tabindex="-1"
        data-state="open"
        data-side="{{ $side }}"
        data-align="{{ $align }}"
        {{ $attributes->merge(['class' => 'z-50 rounded-md border border-[#dce2e6] bg-white p-1 text-sm text-[#2f373d] shadow-[0_16px_36px_rgba(31,41,51,0.14)] outline-none']) }}
    >
        {{ $slot }}
    </div>
</template>
