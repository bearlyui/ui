# Bear UI
Grizzly UI components for Laravel Blade and Livewire.

## Installation
### Requirements

This package is built for Laravel and Livewire and Tailwind CSS, it requires:
- Laravel 10.x
- Livewire 3.x
- Tailwind CSS 3.x
- Tailwind CSS Forms Plugin

### Quick Start

To quickly get started, run the following commands to use the interactive installer:
```bash
composer require bearly/ui
php artisan bear:install
```

### Manual Installation
Require the package with composer
```bash
composer require bearly/ui
```

Next, update your Tailwind CSS configuration file. You'll need to do two things:

1. Add the components' path to the `content` property
2. Ensure you have the colors the components expect

```js
import colors from 'tailwindcss/colors'

export default {
    content: [
        // ...
        './vendor/bearly/ui/**/*.{php,blade.php}'
    ],

    theme: {
        extend: {
            colors: {
                primary: colors.cyan,
                secondary: colors.slate,
                success: colors.green,
                warning: colors.amber,
                danger: colors.red,
            }
        }
    }

    // ...
}
```

Run the build and start using the components:
```bash
npm run dev
```

## Usage
### Using the components
You can use the components directly from the package by prefixing them with `ui:`, like so:
```blade
<ui:card />
```

### Publishing the components
If you wish to customize the components you can publish them to your own `resources/views`
directory by running the `bear:publish` artisan command:

## Development Setup
### Install dependencies
Clone the repository and install dependencies:
```bash
git clone git@github.com:bearly-ui/ui.git
cd ./ui
composer install
npm install
```

### Running the tests
With dependencies installed you should be able to run the tests with `./vendor/bin/phpunit`
