# Configuration

The following things can be configured to customize the UI components:

- The colors (via CSS variables)
- The classes used for focus states (via `config/ui.php`)
- The classes used for links (via `config/ui.php`)

## PHP Configuration

There are only two PHP configuration options at the moment, classes for focus states and links.
You can modify them by publishing the config file to `PROJECT_ROOT/config/ui.php`:

```php
return [
    'focusClasses' => [
        'focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-primary-500/70 focus:ring-offset-white/80',
        'dark:focus:ring-primary-400/70 dark:focus:ring-offset-black/80',
    ],
    'linkClasses' => [
        'font-medium transition text-gray-800 dark:text-gray-200 rounded-xs',
        'hover:text-primary-800 dark:hover:text-primary-200',
        'underline decoration-2 decoration-primary-500/20 hover:decoration-primary-500/50',
    ],
];
```

Alternatively, you can choose to own the blade template for the component(s) you want to customize. This is more flexible, but less convenient.

## Tailwind CSS Configuration

The [installation process](/docs/installation) configures the colors using CSS variables. Change these however you wish to tweak the colors of your own UI.
Usually you'll be importing the `colors.css` file into your `app.css` file, so make sure to add any color customizations
after importing the base colors so that the CSS variables will override the defaults.

The required color names are:

| Color Name   | Description                                                    |
|--------------|----------------------------------------------------------------|
| `primary`    | Main brand color, used for primary actions and key elements    |
| `secondary`  | Supporting color, used for secondary actions and elements      |
| `success`    | Indicates successful actions or positive status                |
| `warning`    | Highlights cautionary actions or items needing attention       |
| `danger`     | Signifies dangerous actions, failures, or critical issues      |


These are the default colors in `colors.css`:

```css
@theme inline {
  /* Primary */
  --color-primary-50: var(--color-indigo-50);
  --color-primary-100: var(--color-indigo-100);
  --color-primary-200: var(--color-indigo-200);
  --color-primary-300: var(--color-indigo-300);
  --color-primary-400: var(--color-indigo-400);
  --color-primary-500: var(--color-indigo-500);
  --color-primary-600: var(--color-indigo-600);
  --color-primary-700: var(--color-indigo-700);
  --color-primary-800: var(--color-indigo-800);
  --color-primary-900: var(--color-indigo-900);
  --color-primary-950: var(--color-indigo-950);

  /* Secondary */
  --color-secondary-50: var(--color-slate-50);
  --color-secondary-100: var(--color-slate-100);
  --color-secondary-200: var(--color-slate-200);
  --color-secondary-300: var(--color-slate-300);
  --color-secondary-400: var(--color-slate-400);
  --color-secondary-500: var(--color-slate-500);
  --color-secondary-600: var(--color-slate-600);
  --color-secondary-700: var(--color-slate-700);
  --color-secondary-800: var(--color-slate-800);
  --color-secondary-900: var(--color-slate-900);
  --color-secondary-950: var(--color-slate-950);

  /* Success */
  --color-success-50: var(--color-green-50);
  --color-success-100: var(--color-green-100);
  --color-success-200: var(--color-green-200);
  --color-success-300: var(--color-green-300);
  --color-success-400: var(--color-green-400);
  --color-success-500: var(--color-green-500);
  --color-success-600: var(--color-green-600);
  --color-success-700: var(--color-green-700);
  --color-success-800: var(--color-green-800);
  --color-success-900: var(--color-green-900);
  --color-success-950: var(--color-green-950);

  /* Warning */
  --color-warning-50: var(--color-amber-50);
  --color-warning-100: var(--color-amber-100);
  --color-warning-200: var(--color-amber-200);
  --color-warning-300: var(--color-amber-300);
  --color-warning-400: var(--color-amber-400);
  --color-warning-500: var(--color-amber-500);
  --color-warning-600: var(--color-amber-600);
  --color-warning-700: var(--color-amber-700);
  --color-warning-800: var(--color-amber-800);
  --color-warning-900: var(--color-amber-900);
  --color-warning-950: var(--color-amber-950);

  /* Danger */
  --color-danger-50: var(--color-red-50);
  --color-danger-100: var(--color-red-100);
  --color-danger-200: var(--color-red-200);
  --color-danger-300: var(--color-red-300);
  --color-danger-400: var(--color-red-400);
  --color-danger-500: var(--color-red-500);
  --color-danger-600: var(--color-red-600);
  --color-danger-700: var(--color-red-700);
  --color-danger-800: var(--color-red-800);
  --color-danger-900: var(--color-red-900);
  --color-danger-950: var(--color-red-950);
}
```
