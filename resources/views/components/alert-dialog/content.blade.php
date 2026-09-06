@props ([
    'width' => '26rem',
])

<template x-teleport="body">
    <div
        x-show="open"
        x-cloak
        class="fixed inset-0 z-[100] flex items-center justify-center p-4"
    >
        <div
            x-show="open"
            x-transition.opacity
            class="fixed inset-0 bg-[#1f2933]/45 backdrop-blur-[1px]"
            aria-hidden="true"
        ></div>

        <div
            x-ref="content"
            x-show="open"
            x-transition.scale.opacity.origin.center
            x-on:keydown.escape.prevent.stop="closeDialog()"
            x-on:keydown.tab="trapFocus($event)"
            role="alertdialog"
            aria-modal="true"
            x-bind:aria-labelledby="$id('alert-dialog-title')"
            x-bind:aria-describedby="$id('alert-dialog-description')"
            tabindex="-1"
            style="width: min({{ $width }}, calc(100vw - 2rem))"
            {{ $attributes->merge(['class' => 'relative rounded-md border border-[#dce2e6] bg-white p-6 text-[#2f373d] shadow-[0_24px_70px_rgba(31,41,51,0.22)] outline-none']) }}
        >
            {{ $slot }}
        </div>
    </div>
</template>
