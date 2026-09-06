@props ([
    'modal' => false,
])

<div
    x-data="dropdownMenu()"
    x-on:keydown.escape.prevent.stop="closeMenu()"
    x-on:keydown.arrow-down.prevent="
        open ? focusNext() : (openMenu(), $nextTick(() => focusFirst()))
    "
    x-on:keydown.arrow-up.prevent="
        open ? focusPrevious() : (openMenu(), $nextTick(() => focusLast()))
    "
    x-on:dropdown-menu-close.window="closeMenu(false)"
    {{ $attributes->merge(['class' => 'relative inline-block text-left']) }}
    data-dropdown-menu-root
    data-modal="{{ $modal ? 'true' : 'false' }}"
>
    {{ $slot }}
</div>
