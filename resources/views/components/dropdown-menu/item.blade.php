@props ([
    'as' => 'button',
    'href' => null,
    'icon' => null,
    'type' => 'button',
    'variant' => 'default',
    'disabled' => false,
    'closeOnSelect' => true,
])

@php
    $classes = match ($variant) {
        'danger' => 'flex w-full items-center gap-2 rounded px-2.5 py-2 text-left text-xs font-medium text-[#b42318] outline-none transition hover:bg-[#fff1f0] focus:bg-[#fff1f0] disabled:pointer-events-none disabled:opacity-50',
        default => 'flex w-full items-center gap-2 rounded px-2.5 py-2 text-left text-xs font-medium text-[#3f4a51] outline-none transition hover:bg-[#eaf8f1] hover:text-[#0ca463] focus:bg-[#eaf8f1] focus:text-[#0ca463] disabled:pointer-events-none disabled:opacity-50',
    };
@endphp

@if ($as === 'a' || $href)
    <a
        href="{{ $disabled ? '#' : ($href ?? '#') }}"
        role="menuitem"
        tabindex="-1"
        data-dropdown-menu-item
        @if ($disabled) aria-disabled="true" @endif
        @if ($closeOnSelect && ! $disabled) x-on:click="open = false" @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >
        @if ($icon)
            <flux:icon
                :name="$icon"
                class="size-4"
            />
        @endif

        {{ $slot }}
    </a>
@else
    <button
        type="{{ $type }}"
        role="menuitem"
        tabindex="-1"
        data-dropdown-menu-item
        @if ($disabled) disabled @endif
        @if ($disabled) aria-disabled="true" @endif
        @if ($closeOnSelect && ! $disabled) x-on:click="open = false" @endif
        {{ $attributes->merge(['class' => $classes]) }}
    >
        @if ($icon)
            <flux:icon
                :name="$icon"
                class="size-4"
            />
        @endif

        {{ $slot }}
    </button>
@endif
