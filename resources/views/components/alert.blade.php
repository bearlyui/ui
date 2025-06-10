@use('Bearly\Ui\Color')
@use('Bearly\Ui\Variant')

@props([
    'dismiss' => false,
    'color' => Color::Primary,
    'variant' => Variant::Outline,
    'role' => 'status',
    'icon' => null,
    'iconVariant' => 'outline',
    'iconAlign' => 'start',
])
<div
    {{ $attributes
        ->merge([
            'role' => $role,
            'x-data' => 'uiAlert',
            'x-bind' => 'uiAlertAttributes',
        ])
        ->class([
            'relative rounded-sm transition ease-in-out text-sm',
            'px-3 py-2.5',

            {{-- Primary --}}
            'text-primary-700 shadow-primary-400/20 border-primary-500/25 bg-primary-50/50' => Color::Primary->is($color),
            'dark:text-primary-400 dark:shadow-primary-300/20 dark:bg-primary-900/35' => Color::Primary->is($color),

            {{-- Secondary --}}
            'text-secondary-600/85 shadow-secondary-400/20 border-secondary-500/25 bg-secondary-50/60' => Color::Secondary->is($color),
            'dark:text-secondary-300/85 dark:shadow-secondary-400/15 dark:bg-secondary-800/25' => Color::Secondary->is($color),

            {{-- Success --}}
            'text-success-700 shadow-success-400/20 border-success-500/25 bg-success-50/65' => Color::Success->is($color),
            'dark:text-success-400 dark:shadow-success-400/15 dark:bg-success-900/30' => Color::Success->is($color),

            {{-- Warning --}}
            'text-warning-700 shadow-warning-400/20 border-warning-500/30 bg-warning-50/50' => Color::Warning->is($color),
            'dark:text-warning-400 dark:shadow-warning-400/15 dark:bg-warning-900/30' => Color::Warning->is($color),

            {{-- Danger --}}
            'text-danger-700 shadow-danger-400/20 border-danger-500/25 bg-danger-50/40' => Color::Danger->is($color),
            'dark:text-danger-400 dark:shadow-danger-400/15 dark:bg-danger-950/55' => Color::Danger->is($color),

            {{-- Outline Variant --}}
            'border' => Variant::Outline->is($variant),
            'dark:border-primary-300/25' => Color::Primary->is($color) && Variant::Outline->is($variant),
            'dark:border-secondary-300/30' => Color::Secondary->is($color) && Variant::Outline->is($variant),
            'dark:border-success-300/25' => Color::Success->is($color) && Variant::Outline->is($variant),
            'dark:border-warning-300/25' => Color::Warning->is($color) && Variant::Outline->is($variant),
            'dark:border-danger-400/25' => Color::Danger->is($color) && Variant::Outline->is($variant),

            {{-- Solid Variant --}}
            'border border-l-[6px]' => Variant::Solid->is($variant),
            'dark:border-l-primary-300/30 dark:border-primary-300/30' => Color::Primary->is($color) && Variant::Solid->is($variant),
            'dark:border-l-secondary-300/30 dark:border-secondary-300/30' => Color::Secondary->is($color) && Variant::Solid->is($variant),
            'dark:border-l-success-300/30 dark:border-success-300/30' => Color::Success->is($color) && Variant::Solid->is($variant),
            'dark:border-l-warning-300/30 dark:border-warning-300/30' => Color::Warning->is($color) && Variant::Solid->is($variant),
            'dark:border-l-danger-400/30 dark:border-danger-400/30' => Color::Danger->is($color) && Variant::Solid->is($variant),

            {{-- Glow Variant --}}
            'shadow-md border' => Variant::Glow->is($variant),
            'dark:border-primary-300/25' => Color::Primary->is($color) && Variant::Glow->is($variant),
            'dark:border-secondary-300/25' => Color::Secondary->is($color) && Variant::Glow->is($variant),
            'dark:border-success-300/25' => Color::Success->is($color) && Variant::Glow->is($variant),
            'dark:border-warning-300/25' => Color::Warning->is($color) && Variant::Glow->is($variant),
            'dark:border-danger-300/25' => Color::Danger->is($color) && Variant::Glow->is($variant),

            {{-- Headings should match text color  --}}
            '[&_[data-ui-heading]]:text-inherit' => empty($color),
            '[&_[data-ui-heading]]:text-primary-800 dark:[&_[data-ui-heading]]:text-primary-200' => Color::Primary->is($color),
            '[&_[data-ui-heading]]:text-secondary-800 dark:[&_[data-ui-heading]]:text-secondary-200' => Color::Secondary->is($color),
            '[&_[data-ui-heading]]:text-success-800 dark:[&_[data-ui-heading]]:text-success-200' => Color::Success->is($color),
            '[&_[data-ui-heading]]:text-warning-800 dark:[&_[data-ui-heading]]:text-warning-200' => Color::Warning->is($color),
            '[&_[data-ui-heading]]:text-danger-800 dark:[&_[data-ui-heading]]:text-danger-200' => Color::Danger->is($color),

            {{-- Subheadings should match text color --}}
            '[&_[data-ui-subheading]]:text-inherit [&_[data-ui-subheading]]:opacity-95',
        ])
    }}
>
    <div @class([
        'flex-1 flex justify-between items-start sm:items-center gap-1' => $dismiss,
        'flex items-stretch' => $icon,
    ])>
        {{-- Icon --}}
        @if ($icon)
            <div @class([
                'inline-flex',
                'items-start' => $iconAlign === 'start',
                'items-center' => $iconAlign === 'center',
                'items-end' => $iconAlign === 'end',
            ])>
                <x-dynamic-component :component="'ui::icon.' . $icon" :variant="$iconVariant" class="opacity-50 mr-3" />
            </div>
        @endif


        {{-- Main content --}}
        <div class="grow">{{ $slot }}</div>

        {{-- Close Button --}}
        @if ($dismiss)
            <div @class([
                'flex items-center align-top'
            ])>
                <button
                    type="button"
                    x-bind="uiAlertClose"
                    aria-label="Close"
                    @class([
                        'p-0.5 -mr-2.5 -mt-1.5 sm:mt-0 sm:mr-0 transition ease-in-out rounded-sm',
                        'text-primary-500 hover:text-primary-900 dark:hover:text-primary-100' => Color::Primary->is($color),
                        'text-secondary-500 hover:text-secondary-900 dark:hover:text-secondary-100' => Color::Secondary->is($color),
                        'text-success-500 hover:text-success-900 dark:hover:text-success-100' => Color::Success->is($color),
                        'text-warning-500 hover:text-warning-900 dark:hover:text-warning-100' => Color::Warning->is($color),
                        'text-danger-500 hover:text-danger-900 dark:hover:text-danger-100' => Color::Danger->is($color),
                        ...config('ui.focusClasses')
                    ])
                >
                    <span class="sr-only">Close</span>
                    <ui:icon-x-mark variant="mini" />
                </button>
            </div>
        @endif
    </div>
</div>
