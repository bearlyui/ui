@props([
    'for' => null,
    'label' => null
])

<div {{ $attributes }}>
    @if ($label ?? false)
        @if ($label instanceof \Illuminate\View\ComponentSlot)
            {{ $label }}
        @else
            <ui:wip.label :$for>{{ $label }}</ui:label>
        @endif
    @endif
    {{ $slot }}
    @if ($for ?? false)
        <ui:wip.input-error class="mt-1" :$for />
    @endif
</div>
