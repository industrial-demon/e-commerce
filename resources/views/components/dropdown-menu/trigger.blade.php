@props ([
    'label' => 'Open menu',
    'disabled' => false,
])

<button
    x-ref="trigger"
    type="button"
    aria-haspopup="menu"
    x-bind:aria-expanded="open.toString()"
    x-on:click.stop="toggleMenu()"
    x-on:keydown.enter.prevent="
        openMenu();
        $nextTick(() => focusFirst());
    "
    x-on:keydown.space.prevent="
        openMenu();
        $nextTick(() => focusFirst());
    "
    @if ($disabled) disabled @endif
    @if ($disabled) data-disabled aria-disabled="true" @endif
    {{ $attributes->merge(['class' => 'inline-flex size-8 items-center justify-center rounded text-[#2f373d] transition hover:bg-[#edf2f4] focus:bg-[#edf2f4] focus:outline-none']) }}
>
    <span class="sr-only">{{ $label }}</span>
    {{ $slot }}
</button>
