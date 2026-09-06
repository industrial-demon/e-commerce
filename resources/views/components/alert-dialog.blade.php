@props ([
    'defaultOpen' => false,
])

<div
    x-data="alertDialog()"
    x-id="['alert-dialog-title', 'alert-dialog-description']"
    @if ($defaultOpen) x-init="openDialog()" @endif
    {{ $attributes->merge(['class' => 'contents']) }}
    data-alert-dialog-root
>
    {{ $slot }}
</div>
