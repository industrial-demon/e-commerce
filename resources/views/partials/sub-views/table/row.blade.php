@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
@endphp

<tr
    {{ $attributes->merge(['class' => 'h-11 border-b border-[#edf1f3] text-xs text-[#465158] transition hover:bg-[#fbfcfd]']) }}
>
    {{ $slot }}
</tr>
