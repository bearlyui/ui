@use('Bearly\Ui\Size')
@use('Bearly\Ui\Color')

@props([
    'hover' => true,
    'hoverColor' => Color::Secondary,
    'radius' => Size::BASE,
    'shadow' => Size::BASE,
])

{{-- We have a wrapping div mainly to apply overflow-x-auto for "responsive" tables --}}
<div @class([
    'overflow-x-auto ring-1 ring-gray-300/60 dark:ring-gray-700 bg-white dark:bg-gray-800',

    {{-- Rounded corners --}}
    'rounded-none' => Size::NONE->is($radius),
    'rounded' => Size::BASE->is($radius),
    'rounded-lg' => Size::LG->is($radius),
    'rounded-xl' => Size::XL->is($radius),

    {{-- Shadows --}}
    'shadow-sm' => Size::BASE->is($shadow),
    'shadow' => Size::LG->is($shadow),
    'shadow-md' => Size::XL->is($shadow),

    {{-- Hover effect on table rows --}}
    '[&_tbody>tr:hover_td]:bg-primary-200/10 dark:[&_tbody>tr:hover_td]:bg-primary-500/5' => $hover && Color::Primary->is($hoverColor),
    '[&_tbody>tr:hover_td]:bg-secondary-200/25 dark:[&_tbody>tr:hover_td]:bg-secondary-500/15' => $hover && Color::Secondary->is($hoverColor),
    '[&_tbody>tr:hover_td]:bg-success-200/10 dark:[&_tbody>tr:hover_td]:bg-success-500/5' => $hover && Color::Success->is($hoverColor),
    '[&_tbody>tr:hover_td]:bg-danger-200/10 dark:[&_tbody>tr:hover_td]:bg-danger-500/5' => $hover && Color::Danger->is($hoverColor),
    '[&_tbody>tr:hover_td]:bg-warning-200/10 dark:[&_tbody>tr:hover_td]:bg-warning-500/5' => $hover && Color::Warning->is($hoverColor),
])>
    <table {{ $attributes->class([
        'w-full',
        'text-sm',
    ]) }}>
        @if ($header)
            <thead {{ $header->attributes->class([
            ]) }}>
                <tr @class([
                ]) >{{ $header }}</tr>
            </thead>
        @endif

        <tbody>{{ $slot }}</tbody>
    </table>
</div>
