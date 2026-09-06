@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
    $summary = $summary ?? null;
@endphp

<div
    {{ $attributes->merge(['class' => 'flex flex-col gap-4 pt-6 text-xs text-[#465158] sm:flex-row sm:items-center sm:justify-between']) }}
>
    @if ($summary)
        <p>{{ $summary }}</p>
    @endif

    {{ $slot }}
</div>
