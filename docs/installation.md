# Getting Started

The components are built for Laravel, Livewire, and Tailwind CSS.

**The minimum required dependencies are:**
- Laravel 10.x
- Livewire 3.x (this also includes Alpine JS)
- Tailwind CSS 3.4.x
- Tailwind CSS Forms Plugin

---

## Quick Start

Installing the Bear UI components is a two step process:

1. Install the package and dependencies via `composer` and `npm` (or `yarn`).
2. Modify your Tailwind CSS configuration to include the Bear UI theme and components.

The easiest way to get started is to use the installer command that comes with the package. Using this in an existing project? You will probably want to use [Manual Installation](#manual-installation)

First, require the package via composer:
```bash
composer require bearly/ui:dev-main
```

Next, run the installer command:
```bash
php artisan bear:install
```

The command will prompt you to install missing dependencies, add the Tailwind CSS configuration. Once it's done you can run your build and use the components in your blade views!

## Manual Installation

If you're installing the package in a new project, we recommend you use the `bear:install` command. If you're installing in an existing project or want full control you can use the following steps to install manually:

### Install the Composer Package

First add the package to your `composer.json` file:
```bash
composer require bearly/ui:dev-main
```

### Modify your Tailwind CSS Config

This step assumes that you already have a working Tailwind CSS installation **with the [tailwindcss/forms](https://github.com/tailwindlabs/tailwindcss-forms) plugin**.
If you don't then please follow the [Tailwind CSS installation guide](https://tailwindcss.com/docs/guides/laravel) and [forms plugin installation](https://github.com/tailwindlabs/tailwindcss-forms?tab=readme-ov-file#installation) guides first.

**Add the following configuration options to your `tailwind.config.js` file:**
```js
import colors from 'tailwindcss/colors' // [tl! add] [tl! focus]

/** @type {import('tailwindcss').Config} */
export default {
  content: [ // [tl! focus]
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    './vendor/bearly/ui/**/*.{php,blade.php}', // [tl! add] [tl! focus]
  ], // [tl! focus]
  theme: { // [tl! focus]
    extend: { // [tl! focus]
      colors: { // [tl! add] [tl! focus]
        primary: colors.cyan, // [tl! add] [tl! focus]
        secondary: colors.slate, // [tl! add] [tl! focus]
        success: colors.green, // [tl! add] [tl! focus]
        warning: colors.amber, // [tl! add] [tl! focus]
        danger: colors.red, // [tl! add] [tl! focus]
      } // [tl! add] [tl! focus]
    }, // [tl! focus]
  }, // [tl! focus]
  plugins: [
    forms,
  ],
}
```

### Livewire Assets

> **Heads up:** Livewire only injects its Javascript assets when it detects a Livewire component by default, so you'll likely want to [Manually include Livewire's frontend assets](https://livewire.laravel.com/docs/installation#manually-including-livewires-frontend-assets) or force asset injection by adding `\Livewire\Livewire::forceAssetInjection();` in your `AppServiceProvider.php` file. Otherwise Alpine and Livewire won't be injected on pages unless they contain a Livewire component.

### Use the components

Run your frontend build with `npm run dev` and start using the components!

**For example, a button:**
```html
<ui:button>Click Me</ui:button>
```

## Customization
Publish the components you'd like to customize to `resources/views/vendor/ui/components` and change however you wish. You own them now!

To publish the components, run the `php artisan bear:publish` command:
```bash
php artisan bear:publish
```
The components you choose will be copied to your `resources/views/vendor/ui` directory.

**Publishing components manually:**
If you wish to publish components manually, the files exist in the `vendor/bearly/ui/resources/views/components` directory. Duplicate to your `PROJECT_ROOT/resources/views/vendor/ui/components` directory to extend them.

For example:
```bash
cp -R vendor/bearly/ui/resources/views/components ./resources/views/vendor/ui/components
```
