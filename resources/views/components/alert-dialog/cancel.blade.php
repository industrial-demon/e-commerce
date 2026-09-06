@props ([
    'type' => 'button',
])

<button
    x-ref="cancel"
    type="{{ $type }}"
    x-on:click="closeDialog()"
    {{ $attributes->merge(['class' => 'inline-flex h-9 items-center justify-center rounded-md border border-[#dce2e6] bg-white px-4 text-sm font-semibold text-[#465158] transition hover:bg-[#f5f8fa] focus:outline-none focus:ring-4 focus:ring-[#0ca463]/10']) }}
>
    {{ $slot }}
</button>
