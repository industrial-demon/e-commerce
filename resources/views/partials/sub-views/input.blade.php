@props (['name' => 'input', 'label' => null ,'type'=> 'text', 'value' => '', 'error'=> null])


<div class="flex flex-col">
    @if ($label)
        <label>{{ $label }}</label>
    @endif

    <input
        class="h-10 border-2 text-zinc-600 outline-0 bg-white"
        type="text"
        name="{{ $name }}"
        value="{{ $value }}"
        type="{{ $type }}"
    />

    @if ($error)
        <div class="text-red-500">{{$error}}</div>
    @endif
</div>
