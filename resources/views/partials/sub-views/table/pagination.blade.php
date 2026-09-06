@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
@endphp

@if ($paginator->hasPages())
    <nav
        {{ $attributes->merge(['class' => 'inline-flex overflow-hidden rounded-md border border-[#dce2e6] bg-white']) }}
        aria-label="Pagination"
    >
        @if ($paginator->previousPageUrl())
            <a
                href="{{ $paginator->previousPageUrl() }}"
                class="inline-flex h-8 items-center border-r border-[#dce2e6] px-3 text-[#465158] transition hover:bg-[#f5f8fa]"
            >
                Previous
            </a>
        @else
            <span
                class="inline-flex h-8 items-center border-r border-[#dce2e6] px-3 text-[#a6afb5]"
            >
                Previous
            </span>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span
                    class="inline-flex size-8 items-center justify-center border-r border-[#dce2e6] text-[#a6afb5]"
                >
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page === $paginator->currentPage())
                        <span
                            aria-current="page"
                            class="inline-flex size-8 items-center justify-center border-r border-[#dce2e6] bg-[#0ca463] font-semibold text-white"
                        >
                            {{ $page }}
                        </span>
                    @else
                        <a
                            href="{{ $url }}"
                            class="inline-flex size-8 items-center justify-center border-r border-[#dce2e6] text-[#465158] transition hover:bg-[#f5f8fa]"
                        >
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->nextPageUrl())
            <a
                href="{{ $paginator->nextPageUrl() }}"
                class="inline-flex h-8 items-center px-3 text-[#465158] transition hover:bg-[#f5f8fa]"
            >
                Next
            </a>
        @else
            <span class="inline-flex h-8 items-center px-3 text-[#a6afb5]">
                Next
            </span>
        @endif
    </nav>
@endif
