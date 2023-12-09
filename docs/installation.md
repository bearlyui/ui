## Installation
### Requirements
This package is built for Laravel and Livewire and Tailwind CSS, it requires:
- Laravel 10.x
- Livewire 3.x
- Tailwind CSS 3.x _(if using the Tailwind plugin)_
- Tailwind CSS Forms Plugin

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
@verbatim<x-ui::input />@endverbatim
```
