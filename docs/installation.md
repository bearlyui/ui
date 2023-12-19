# Installation

There are several ways to use these components. The easiest way is to install the package and use the components directly from the package. The other way is to copy the components into your project.

While the second method may seem burdensome, it gives you the most flexibility.
- Slim footprint -- only include the components that you use.
- You can easily customize the components to fit your needs.
- No extra dependencies, you own the code now!


## Requirements
The components are built for Laravel, Livewire, and Tailwind CSS.

**The required dependencies are:**
- Laravel 10.x
- Livewire 3.x
- Tailwind CSS 3.x _(if using the Tailwind plugin)_
- Tailwind CSS Forms Plugin

## Usage Methods

There are three ways to use the components:

1. Installing the xompowe package and using them with the `<x-ui::` prefix
1. Use the `ui:install` command to choose the components to publish into your project (recommended)
1. Copying them directly from the documentation (_make sure you have the Tailwind CSS plugin installed_)

All methods expect you have the required dependencies installed -- **including the Bear UI Tailwind CSS plugin**.


## Installation Via Composer
### How to Install
Add the repository to your `composer.json` file:
> This step is temporary (because this isn't on packagist yet), and will be removed once the package is published.
```json
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/bearly-ui/ui"
    }
],
```

Install the package with composer, and the Tailwind CSS forms plugin:
```bash
composer require bearly/ui:dev-main
npm i --save-dev @tailwindcss/forms
```
Next, add the tailwind plugin to your `tailwind.config.js` file.
```js
import forms from '@tailwindcss/forms'
import bearUI from './vendor/bearly/ui/ui'

// Currently Bear UI only supports ESM -- PRs welcome!
export default {
    // This is a workaround right now until I figure out how to get the
    // Tailwind plugin to configure its own content path automatically
    content: [
        // ...
        './vendor/bearly/ui/resources/**/*.blade.php'
    ],
    // ...
    plugins: [forms, bearUI],
}
```

Run the build and start using the components:
```bash
npm run dev
```

Either directly from the package, or copy them into your project.

### Using Components
You can use the components directly from the package by prefixing them with `x-ui::`
```blade
<x-ui::input />
```

## One-time Installation
This is the most flexible way to use the components, but it requires you to copy the components into your project.
To make this easy, there is an install command provided with the composer package.

>  **⛔️ Warning! ⛔️** _This doesn't actually work yet, but it will soon enough._

### Install Package
First, install the package via composer. Then run the interactive install command.

```bash
composer require bearly/ui:dev-main
php artisan ui:install
```

### Run the Install Command

You'll be prompted about installing the dependencies, then get to pick and choose the components you'd like to put into your project.

**The prompts will happen in this order:**
1. Install missing dependencies?
1. Install Bear UI plugin to the Tailwind CSS config file?
1. Choose the components you'd like to install

### Using Components
Once you've installed the components, you can use them directly in your project.
(your location may vary -- it's your world now!)

```blade
<x-input />
```
