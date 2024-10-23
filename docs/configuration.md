# Configuration

There are two things you make configure in the package so far:

- The colors (via Tailwind CSS config)
- The classes used for focus states (via `config/ui.php`)

## PHP Configuration

There is only one PHP configuration option at the moment, and it's for the focus states.
You can modify this by publishing the config file to `PROJECT_ROOT/config/ui.php`:

```php
return [
    'focusClasses' => [
        'focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500/70 focus:ring-offset-white/80',
        'dark:focus:ring-primary-400/70 dark:focus:ring-offset-black/80',
    ],
];
```

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
| `error`      | Signifies errors, failures, or critical issues                 |

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
      'error': colors.red, // [tl! focus]
    }, // [tl! focus]
  },
},
```

