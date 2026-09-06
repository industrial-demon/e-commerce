@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
@endphp

<tbody {{ $attributes }}>{{ $slot }}</tbody>
