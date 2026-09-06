@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
    $align = $align ?? 'left';
    $sortable = $sortable ?? false;
    $width = $width ?? null;

    $alignClass = match ($align) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };

    $justifyClass = match ($align) {
        'center' => 'justify-center',
        'right' => 'justify-end',
        default => 'justify-start',
    };
@endphp

<th
    scope="col"
    @if ($width) style="width: {{ $width }}" @endif
    {{ $attributes->merge(['class' => trim('px-6 text-xs font-semibold tracking-normal text-[#2f373d] ' . $alignClass)]) }}
>
    <span
        class="{{ trim('flex items-center gap-1.5 whitespace-nowrap ' . $justifyClass) }}"
    >
        <span>{{ $slot }}</span>

        @if ($sortable)
            <flux:icon
                name="chevrons-up-down"
                class="size-3.5 text-[#2f373d]"
            />
        @endif
    </span>
</th>
