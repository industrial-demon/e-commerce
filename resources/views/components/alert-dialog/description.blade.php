<p
    x-bind:id="$id('alert-dialog-description')"
    {{ $attributes->merge(['class' => 'mt-2 text-sm leading-6 text-[#6f7a82]']) }}
>
    {{ $slot }}
</p>
