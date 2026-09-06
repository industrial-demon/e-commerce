@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
    $title = $title ?? null;
    $summary = $summary ?? null;
    $minWidth = $minWidth ?? '860px';
    $tableClass = $tableClass ?? '';
    $tableId = $tableId ?? null;
@endphp

<section
    {{ $attributes->merge(['class' => 'rounded-md border border-[#e7edf0] bg-white px-4 py-5 shadow-[0_14px_35px_rgba(47,55,61,0.06)] sm:px-6']) }}
>
    @if ($title)
        <h2 class="mb-5 text-lg font-semibold tracking-normal text-[#2f373d]">
            {{ $title }}
        </h2>
    @endif

    <div class="overflow-x-auto">
        <table
            @if ($tableId) id="{{ $tableId }}" @endif
            class="{{ trim('w-full table-fixed border-collapse ' . $tableClass) }}"
            style="min-width: {{ $minWidth }}"
        >
            {{ $slot }}
        </table>
    </div>

    @isset ($footer)
        {{ $footer }}
    @elseif ($summary)
        <div class="pt-6 text-xs text-[#465158]">{{ $summary }}</div>
    @endisset
</section>
