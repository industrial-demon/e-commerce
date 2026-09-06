@props ([
    'type' => 'button',
])

<button
    type="{{ $type }}"
    x-on:click="
        $dispatch('dropdown-menu-close');
        openDialog();
    "
    {{ $attributes->merge(['class' => 'inline-flex items-center justify-center rounded-md bg-[#0ca463] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#098f56] focus:outline-none focus:ring-4 focus:ring-[#0ca463]/15']) }}
>
    {{ $slot }}
</button>
