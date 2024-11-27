@use('Bearly\Ui\Color')
@use('Bearly\Ui\Variant')
@props([
    'dismissable' => false,
    'color' => Color::Primary,
    'variant' => Variant::Outline,
])
{{-- TO DO:
- Aria attributes on heading and subheading by default
- Other aria attributes?
- Test with screen reader
- Write documentation
 --}}
<div
    x-data="{
        open: true,
        init() {
            this.$nextTick(() => {
                const heading = this.$el.querySelector('[data-ui-heading]')
                if (heading) {
                    heading.setAttribute('x-bind:id', '$id(\'alert-title\')')
                    this.$el.setAttribute('x-bind:aria-labelledby', '$id(\'alert-title\')')
                }

                const subheading = this.$el.querySelector('[data-ui-subheading]')
                if (subheading) {
                    subheading.setAttribute('x-bind:id', '$id(\'alert-description\')')
                    this.$el.setAttribute('x-bind:aria-describedby', '$id(\'alert-description\')')
                }
            })
        }
    }"
    x-id="['alert-title', 'alert-description']"
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-75 translate-y-full"
    x-transition:enter-end="opacity-100 scale-[1.02] -translate-y-1"
    x-transition:leave="transition ease-in-out duration-300"
    x-transition:leave-start="opacity-100 scale-100 -translate-y-full"
    x-transition:leave-end="opacity-0 scale-75 translate-y-full"

    {{ $attributes
        ->merge(['role' => 'status'])
        ->class([
            'relative rounded transition ease-in-out',
            'bg-white dark:bg-gray-950/40',
            'px-3 py-2',

            {{-- Primary --}}
            'text-primary-700 shadow-primary-400/20 border-primary-500/25 bg-primary-50/30' => Color::Primary->is($color),
            'dark:text-primary-400 dark:shadow-primary-300/20 dark:bg-primary-900/20' => Color::Primary->is($color),

            {{-- Secondary --}}
            'text-secondary-700 shadow-secondary-400/20 border-secondary-500/25 bg-secondary-50/40' => Color::Secondary->is($color),
            'dark:text-secondary-400 dark:shadow-secondary-400/15 dark:bg-secondary-700/40' => Color::Secondary->is($color),

            {{-- Success --}}
            'text-success-700 shadow-success-400/20 border-success-500/25 bg-success-50/40' => Color::Success->is($color),
            'dark:text-success-400 dark:shadow-success-400/15 dark:bg-success-900/20' => Color::Success->is($color),

            {{-- Warning --}}
            'text-warning-700 shadow-warning-400/20 border-warning-500/30 bg-warning-50/30' => Color::Warning->is($color),
            'dark:text-warning-400 dark:shadow-warning-400/15 dark:bg-warning-900/20' => Color::Warning->is($color),

            {{-- Error --}}
            'text-error-700 shadow-error-400/20 border-error-500/25 bg-error-50/40' => Color::Error->is($color),
            'dark:text-error-400 dark:shadow-error-400/15 dark:bg-error-900/20' => Color::Error->is($color),

            {{-- Outline Variant --}}
            'border' => Variant::Outline->is($variant),
            'dark:border-l-primary-300 dark:border-primary-300/60' => Color::Primary->is($color) && Variant::Outline->is($variant),
            'dark:border-l-secondary-300 dark:border-secondary-300/60' => Color::Secondary->is($color) && Variant::Outline->is($variant),
            'dark:border-l-success-300 dark:border-success-300/60' => Color::Success->is($color) && Variant::Outline->is($variant),
            'dark:border-l-warning-300 dark:border-warning-300/60' => Color::Warning->is($color) && Variant::Outline->is($variant),
            'dark:border-l-error-400 dark:border-error-400/60' => Color::Error->is($color) && Variant::Outline->is($variant),

            {{-- Solid Variant --}}
            'border border-l-[6px]' => Variant::Solid->is($variant),
            'dark:border-l-primary-300 dark:border-primary-300/60' => Color::Primary->is($color) && Variant::Solid->is($variant),
            'dark:border-l-secondary-300 dark:border-secondary-300/60' => Color::Secondary->is($color) && Variant::Solid->is($variant),
            'dark:border-l-success-300 dark:border-success-300/60' => Color::Success->is($color) && Variant::Solid->is($variant),
            'dark:border-l-warning-300 dark:border-warning-300/60' => Color::Warning->is($color) && Variant::Solid->is($variant),
            'dark:border-l-error-400 dark:border-error-400/60' => Color::Error->is($color) && Variant::Solid->is($variant),

            {{-- Glow Variant --}}
            'shadow-md border' => Variant::Glow->is($variant),
            'dark:border-primary-300/20' => Color::Primary->is($color) && Variant::Glow->is($variant),
            'dark:border-secondary-300/20' => Color::Secondary->is($color) && Variant::Glow->is($variant),
            'dark:border-success-300/20' => Color::Success->is($color) && Variant::Glow->is($variant),
            'dark:border-warning-300/20' => Color::Warning->is($color) && Variant::Glow->is($variant),
            'dark:border-error-300/20' => Color::Error->is($color) && Variant::Glow->is($variant),

            {{-- Headings should match text color  --}}
            '[&_[data-ui-heading]]:text-inherit' => empty($color),
            '[&_[data-ui-heading]]:text-primary-800 dark:[&_[data-ui-heading]]:text-primary-200' => Color::Primary->is($color),
            '[&_[data-ui-heading]]:text-secondary-800 dark:[&_[data-ui-heading]]:text-secondary-200' => Color::Secondary->is($color),
            '[&_[data-ui-heading]]:text-success-800 dark:[&_[data-ui-heading]]:text-success-200' => Color::Success->is($color),
            '[&_[data-ui-heading]]:text-warning-800 dark:[&_[data-ui-heading]]:text-warning-200' => Color::Warning->is($color),
            '[&_[data-ui-heading]]:text-error-800 dark:[&_[data-ui-heading]]:text-error-200' => Color::Error->is($color),

            {{-- Subheadings should match text color --}}
            '[&_[data-ui-subheading]]:text-inherit [&_[data-ui-subheading]]:opacity-80',
        ])
    }}
>
    <div @class([
        'flex-1 flex justify-between items-start sm:items-center gap-1' => $dismissable,
    ])>
        {{-- Main content --}}
        <div>{{ $slot }}</div>

        {{-- Close Button --}}
        @if ($dismissable)
            <div @class([
                'flex items-center align-top'
            ])>
                <button
                    type="button"
                    x-ref="closeButton"
                    aria-label="Close"
                    @class([
                        'p-1.5 pr-0 -mr-1.5 -mt-0.5 pt-0 sm:mt-0 sm:mr-0 transition ease-in-out rounded',
                        'text-primary-500 hover:text-primary-800 dark:hover:text-primary-100' => Color::Primary->is($color),
                        'text-secondary-500 hover:text-secondary-800 dark:hover:text-secondary-100' => Color::Secondary->is($color),
                        'text-success-500 hover:text-success-800 dark:hover:text-success-100' => Color::Success->is($color),
                        'text-warning-500 hover:text-warning-800 dark:hover:text-warning-100' => Color::Warning->is($color),
                        'text-error-500 hover:text-error-800 dark:hover:text-error-100' => Color::Error->is($color),
                        ...config('ui.focusClasses')
                    ])
                    @keyup.enter="open = false"
                    @keyup.space="open = false"
                    @click.prevent="open = false"
                >
                    <span class="sr-only">Close</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
</div>
