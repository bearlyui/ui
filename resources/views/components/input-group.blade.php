@props([
    'for' => null,
    'label' => null
])

<div {{ $attributes }}>
    @if ($label ?? false)
        @if ($label instanceof \Illuminate\View\ComponentSlot)
            {{ $label }}
        @else
            <x-ui::label :$for>{{ $label }}</x-ui::label>
        @endif
    @endif
    {{ $slot }}
    @if ($for ?? false)
        <x-ui::input-error class="mt-1" :$for />
    @endif
</div>
