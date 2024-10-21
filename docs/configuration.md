# Configuration

There are two methods of configuring the UI package: using the `ui.php` file or using the Tailwind config file.

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

The `bear:install` artisan command configures some default values in your Tailwind CSS configuration file, but you are free to change any colors you wish.

The default color names needed are:

| Color Name   | Description                                                    |
|--------------|----------------------------------------------------------------|
| `primary`    | Main brand color, used for primary actions and key elements    |
| `secondary`  | Supporting color, used for secondary actions and elements      |
| `success`    | Indicates successful actions or positive status                |
| `warning`    | Highlights cautions or items needing attention                 |
| `error`      | Signifies errors, failures, or critical issues                 |

In terms of your Tailwind CSS configuration file, you need something like the following:

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
