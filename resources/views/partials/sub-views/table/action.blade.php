@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
    $as = $as ?? 'button';
    $href = $href ?? null;
    $icon = $icon ?? 'ellipsis-horizontal';
    $label = $label ?? 'Actions';
    $variant = $variant ?? 'plain';

    $classes =
        $variant === 'success'
            ? 'inline-flex size-8 items-center justify-center rounded border border-[#26c281] text-[#0ca463] transition hover:bg-[#eaf8f1]'
            : 'inline-flex size-8 items-center justify-center rounded text-[#2f373d] transition hover:bg-[#edf2f4]';
@endphp

@if ($as === 'a' || $href)
    <a
        href="{{ $href ?? '#' }}"
        {{ $attributes->merge(['class' => $classes, 'aria-label' => $label]) }}
    >
        <flux:icon
            :name="$icon"
            class="size-4"
        />
    </a>
@else
    <button
        type="button"
        {{ $attributes->merge(['class' => $classes, 'aria-label' => $label]) }}
    >
        <flux:icon
            :name="$icon"
            class="size-4"
        />
    </button>
@endif
