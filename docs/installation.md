# Getting Started

## Philosophy

Creating reusable components is tough. You want them to be easy to install, but also easily customized.
The components in this package aren't meant to be installed and used directly -- they're meant to be copied into
your project so that you own them and can customize them. This is hugely inspired by [shadcn/ui](https://ui.shadcn.com/).

## Quick Start

Installing the Bear UI components is a two step process. In general, it goes like this:

1. Install the package and dependencies via `composer` and `npm` (or `yarn`).
2. Choose the components you'd like to use and publish them into your project.

The easiest way to get started is to use the installer command that comes with the package.

First, require the package via composer:
```bash
composer require bearly/ui:dev-main
```

Next, run the installer command:
```bash
php artisan bear:install
```

The command will prompt you to install missing dependencies, add the Tailwind CSS plugin, and choose the components you'd like to install.

## Requirements
The components are built for Laravel, Livewire, and Tailwind CSS.

**The minimum required dependencies are:**
- Laravel 10.x
- Livewire 3.x (this also includes Alpine JS)
- Tailwind CSS 3.4.x
- Tailwind CSS Forms Plugin

## Manual Installation

It's recommended to use the `bear:install` command to perform these steps, but if you'd like to install the components manually, here's how.

### Install the Composer Package

First add the package to your `composer.json` file:
```bash
composer require bearly/ui:dev-main
```

### Install the Tailwind CSS Plugin

This step assumes that you already have a working Tailwind CSS installation **with the [tailwindcss/forms](https://github.com/tailwindlabs/tailwindcss-forms) plugin**.
If you don't then please follow the [Tailwind CSS installation guide](https://tailwindcss.com/docs/guides/laravel) and [forms plugin installation](https://github.com/tailwindlabs/tailwindcss-forms?tab=readme-ov-file#installation) guides first.

**Add the Bear UI Tailwind CSS plugin to your `tailwind.config.js` file:**
```js
import bearUI from './vendor/bearly/ui/ui' // [!tl add]

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    bearUI, // [!tl add]
  ],
}
```

### Install Livewire

If you haven't already, install Livewire via composer:
```bash
composer require livewire/livewire
```

> **Heads up:** Livewire only injects its Javascript assets when it detects a Livewire component by default, so you'll likely want to [Manually include Livewire's frontend assets](https://livewire.laravel.com/docs/installation#manually-including-livewires-frontend-assets) or force asset injection by adding `\Livewire\Livewire::forceAssetInjection();` in your `AppServiceProvider.php` file. Otherwise Alpine and Livewire won't be injected on pages unless they contain a Livewire component.

### Add the Components

Now that you've installed Tailwind CSS and Livewire, you can add the components to your project. You can either run the `bear:add` command to copy them for you or copy them manually to start using the components.

**To add the components with the command:**
```bash
php artisan bear:add
```

**To add the components manually:**
If you wish to copy them manually, the files exist in the `vendor/bearly/ui/resources/views/components` directory. Simply copy them into your `PROJECT_ROOT/resources/views/components` directory to use them.

For example:
```bash
cp -R vendor/bearly/ui/resources/views/components ./resources/views/components
```

### Build Your Assets

Finally, run your build command to compile your assets:
```js
npm run dev
// or
npm run build
```




- Require with composer
- Ensure you have Tailwind CSS installed with the forms plugin and a working build
- Install Tailwind plugin
- Install Livewire
- Add component files manually or run add command
- Run the build
