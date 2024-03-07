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

- Require with composer
- Ensure you have Tailwind CSS installed with the forms plugin and a working build
- Install Tailwind plugin
- Add component files manually or run add command
- Run the build
