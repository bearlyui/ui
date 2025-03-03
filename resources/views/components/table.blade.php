@use('Bearly\Ui\Size')
@use('Bearly\Ui\Color')

@props([
    'hover' => false,
    'hoverColor' => Color::Secondary,
    'radius' => Size::SM,
    'shadow' => Size::SM,
    'striped' => false,
    'empty' => false,
    'emptyMessage' => 'No data found',
    'inset' => false,
    'containerClass' => '',
])

{{-- We have a wrapping div mainly to apply overflow-x-auto for "responsive" tables --}}
<div
{{ $inset ? 'data-ui-table-inset' : '' }}
@class([
    'overflow-x-auto',
    'ring-1 ring-gray-300/60 dark:ring-gray-700 bg-white dark:bg-gray-800',

    {{-- Rounded corners --}}
    'rounded-none' => Size::NONE->is($radius),
    'rounded-sm' => Size::SM->is($radius),
    'rounded-lg' => Size::MD->is($radius),
    'rounded-xl' => Size::LG->is($radius),

    {{-- Shadows --}}
    'shadow-xs' => Size::SM->is($shadow),
    'shadow-sm' => Size::MD->is($shadow),
    'shadow-md' => Size::LG->is($shadow),

    {{-- Optional container class --}}
    $containerClass,
])>
    @unless ($empty)
        <table {{ $attributes
            ->merge([
                'data-ui-table',
            ])
            ->class([
                'w-full text-sm print:w-fit',

                {{-- Striping --}}
                '[&_tbody>tr:nth-child(even)_td]:bg-gray-100/50 dark:[&_tbody>tr:nth-child(odd)_td]:bg-gray-900/30 dark:[&_tbody>tr:nth-child(even)_td]:bg-transparent' => $striped,

                {{-- Hover --}}
                '[&_tbody>tr:hover_td]:bg-primary-200/10 dark:[&_tbody>tr:hover_td]:bg-primary-500/5' => $hover && Color::Primary->is($hoverColor),
                '[&_tbody>tr:hover_td]:bg-secondary-200/25 dark:[&_tbody>tr:hover_td]:bg-secondary-500/15' => $hover && Color::Secondary->is($hoverColor),
                '[&_tbody>tr:hover_td]:bg-success-200/10 dark:[&_tbody>tr:hover_td]:bg-success-500/5' => $hover && Color::Success->is($hoverColor),
                '[&_tbody>tr:hover_td]:bg-danger-200/10 dark:[&_tbody>tr:hover_td]:bg-danger-500/5' => $hover && Color::Danger->is($hoverColor),
                '[&_tbody>tr:hover_td]:bg-warning-200/10 dark:[&_tbody>tr:hover_td]:bg-warning-500/5' => $hover && Color::Warning->is($hoverColor),
            ]) }}
        >
            @isset ($header)
                <thead {{ $header->attributes }}>
                    <tr @class([
                        {{-- Sticky header --}}
                        '[&>th]:sticky [&>th]:top-0 [&>th]:backdrop-blur-lg' => $header->attributes->has('sticky'),
                        '[&>th:after]:w-full [&>th:after]:absolute [&>th:after]:left-0 [&>th:after]:bottom-0 [&>th:after]:h-px' => $header->attributes->has('sticky'),
                        '[&>th]:border-none [&>th:after]:bg-gray-200 dark:[&>th:after]:bg-gray-700' => $header->attributes->has('sticky'),

                        {{-- Rounded corners --}}
                        '[&>th:first-child]:rounded-none [&>th:last-child]:rounded-none' => Size::NONE->is($radius),
                        '[&>th:first-child]:rounded-tl [&>th:last-child]:rounded-tr' => Size::SM->is($radius),
                        '[&>th:first-child]:rounded-tl-lg [&>th:last-child]:rounded-tr-lg' => Size::MD->is($radius),
                        '[&>th:first-child]:rounded-tl-xl [&>th:last-child]:rounded-tr-xl' => Size::LG->is($radius),
                    ]) >{{ $header }}</tr>
                </thead>
            @endisset

            <tbody @class([
                {{-- Rounded corners --}}
                '[&>tr:last-child>td:first-child]:rounded-none [&>tr:last-child>td:last-child]:rounded-none' => Size::NONE->is($radius),
                '[&>tr:last-child>td:first-child]:rounded-bl [&>tr:last-child>td:last-child]:rounded-br' => Size::SM->is($radius),
                '[&>tr:last-child>td:first-child]:rounded-bl-lg [&>tr:last-child>td:last-child]:rounded-br-lg' => Size::MD->is($radius),
                '[&>tr:last-child>td:first-child]:rounded-bl-xl [&>tr:last-child>td:last-child]:rounded-br-xl' => Size::LG->is($radius),
            ])>{{ $slot }}</tbody>
        </table>
    @else
        <div class="p-4 text-center text-sm text-gray-500 dark:text-gray-400">{{ $emptyMessage }}</div>
    @endunless
</div>
