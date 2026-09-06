<h2
    x-bind:id="$id('alert-dialog-title')"
    {{ $attributes->merge(['class' => 'text-lg font-semibold tracking-normal text-[#2f373d]']) }}
>
    {{ $slot }}
</h2>
