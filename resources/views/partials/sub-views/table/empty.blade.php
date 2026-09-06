@php
    $attributes = $attributes ?? new \Illuminate\View\ComponentAttributeBag();
    $columns = $columns ?? 1;
    $message = $message ?? 'No records found.';
@endphp

<tr>
    <td
        colspan="{{ $columns }}"
        {{ $attributes->merge(['class' => 'px-6 py-12 text-center text-sm text-[#7f8a91]']) }}
    >
        {{ $message }}
    </td>
</tr>
