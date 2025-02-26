# Configuration

The following things can be configured to customize the UI components:

- The colors (via Tailwind CSS config)
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

The [installation process](/docs/installation) configures some default values in your
Tailwind CSS configuration file. Change these however you wish to tweak the colors of your own UI.

The required color names are:

| Color Name   | Description                                                    |
|--------------|----------------------------------------------------------------|
| `primary`    | Main brand color, used for primary actions and key elements    |
| `secondary`  | Supporting color, used for secondary actions and elements      |
| `success`    | Indicates successful actions or positive status                |
| `warning`    | Highlights cautions or items needing attention                 |
| `danger`      | Signifies dangers, failures, or critical issues                 |

Your Tailwind config file should look something like this:

```js
import colors from 'tailwindcss/colors'

theme: {
  extend: {
    colors: { // [tl! focus]
      'primary': colors.cyan, // [tl! focus]
      'secondary': colors.slate, // [tl! focus]
      'success': colors.green, // [tl! focus]
      'warning': colors.amber, // [tl! focus]
      'danger': colors.red, // [tl! focus]
    }, // [tl! focus]
  },
},
```
