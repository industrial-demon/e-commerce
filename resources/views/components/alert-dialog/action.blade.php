@props ([
    'type' => 'button',
])

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'inline-flex h-9 items-center justify-center rounded-md bg-[#d92d20] px-4 text-sm font-semibold text-white transition hover:bg-[#b42318] focus:outline-none focus:ring-4 focus:ring-[#d92d20]/15']) }}
>
    {{ $slot }}
</button>
