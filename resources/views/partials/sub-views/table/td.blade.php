@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
    $align = $align ?? 'left';
    $truncate = $truncate ?? true;

    $alignClass = match ($align) {
        'center' => 'text-center',
        'right' => 'text-right',
        default => 'text-left',
    };
@endphp

<td
    {{ $attributes->merge(['class' => trim('px-6 py-2 align-middle ' . $alignClass)]) }}
>
    @if ($truncate)
        <span class="block truncate">{{ $slot }}</span>
    @else
        {{ $slot }}
    @endif
</td>
