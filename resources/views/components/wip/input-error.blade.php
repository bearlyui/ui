@props(['for'])
<div {{ $attributes->class(['text-red-500 dark:text-red-400 text-sm']) }}>
    @error($for)
        <p>{{ $message }}</p>
    @enderror
</div>
