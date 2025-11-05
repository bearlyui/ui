# Bear UI
Grizzly UI components for Laravel Blade and Livewire.

## Installation
### Requirements

This package is built for Laravel and Livewire and Tailwind CSS, it requires:
- Laravel 10.x
- Livewire 3.x
- Tailwind CSS 3.x
- Tailwind CSS Forms Plugin

### How to Install
To install the package follow the [Installation instructions in the docs](https://ui.austencam.dev/docs/installation).


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
