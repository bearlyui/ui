# Bear UI
Grizzly UI components for Laravel Blade and Livewire.

**You can use the components in several ways**
- Directly from the composer package - (i.e. `<x-ui::input ...>`)
- By copying the blade components into your project - (i.e. `<x-input ...>`)

In either case, it's recommended to include the Tailwind plugin for the best experience.

## Installation
### Requirements
This package is built for Laravel and Livewire and Tailwind CSS, it requires:
- Laravel 10.x
- Livewire 3.x
- Tailwind CSS 3.x _(if using the Tailwind plugin)_

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

Install the package with composer:
```bash
composer require bearly/ui:dev-main
```
Next, add the tailwind plugin to your `tailwind.config.js` file:
```js
module.exports = {
  // ...
  plugins: [
    require('@bearly-ui/ui/tailwind'),
  ],
}
```
Finally, you can either use the components directly from the package, or copy them into your project.

## Usage
### Using the components
You can use the components directly from the package by prefixing them with `x-ui::`:
```blade
<x-ui::input />
```
### Copying the components
WIP
<!-- TO DO: implement something like this using prompts to publish stuff? -->
<!-- You can copy the components into your project by running the `ui:install` command:
```bash
php artisan bear-ui:install
``` -->

## Development Setup
### Install dependencies
Clone the repository and install dependencies:
```bash
git clone git@github.com:bearly-ui/ui.git
cd ./ui
npm install
composer install
```

### Running the tests
With dependencies installed you should be able to run the tests with `./vendor/bin/phpunit`
