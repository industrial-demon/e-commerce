@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
@endphp

<thead {{ $attributes }}>
    <tr class="h-10 bg-[#f5f8fa]">{{ $slot }}</tr>
</thead>
