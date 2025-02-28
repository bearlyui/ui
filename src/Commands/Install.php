<?php

namespace Bearly\Ui\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\note;
use function Laravel\Prompts\spin;

class Install extends Command
{
    use Welcome;

    public $signature = 'bear:install
        {--skip-welcome : Skip the welcome message}';

    public function handle()
    {
        $this->welcome();
        $this->installTailwind();
        $this->newLine();
        $this->installLivewire();
        $this->installAppLayoutComponent();
        $this->newLine();
        $this->installJsAssets();
        Artisan::call('view:clear');
        info('✅  Bear UI installation complete. Enjoy! 🐻');
    }

    protected function installJsAssets()
    {
        $jsFile = File::get(base_path('resources/js/app.js'));
        // If there's Livewire.start() in the JS file, we need to add the Alpine plugin
        if (str($jsFile)->contains('Livewire.start()')) {
            File::put(base_path('resources/js/app.js'), str($jsFile)->prepend("import ui from '../../vendor/bearly/ui/js/index.js'\n"));
            File::put(base_path('resources/js/app.js'), str($jsFile)->replace('Livewire.start()', "Alpine.plugin(ui)\n Livewire.start()"));
            info('✅  Alpine plugin installed.');

            return;
        }

        $output = str($jsFile);
        // Otherwise, we just call the ui function when Alpine init happens
        if (! $output->contains("import { ui } from '../../vendor/bearly/ui/js/index.js'")) {
            $output = $output->prepend("import { ui } from '../../vendor/bearly/ui/js/index.js'\n");
        }

        if (! $output->contains("document.addEventListener('alpine:init', () => {")) {
            $output = $output->append("document.addEventListener('alpine:init', () => {\n  ui(window.Alpine)\n})\n");
        }

        File::put(base_path('resources/js/app.js'), $output);

        info('✅  Script assets installed.');
    }

    protected function installLivewire()
    {
        note('🛠️  Checking for Livewire installation...');

        $livewireInstalled = str(File::get(base_path('composer.json')))->contains('livewire/livewire');

        if ($livewireInstalled) {
            info('👍  Livewire is already installed.');

            return;
        }

        if (confirm('⛔️  Livewire is not installed. Do you want to install it now?')) {
            spin(function () {
                Process::run('composer require livewire/livewire')->throw();
                info('✅  Livewire installed.');
            }, 'Installing Livewire...');
        }
    }

    protected function installAppLayoutComponent()
    {
        $appLayoutComponentExists = File::exists(base_path('resources/views/components/layouts/app.blade.php'));
        if (! $appLayoutComponentExists && confirm('⛔️  No `layouts.app` component found. Do you want to create one now?')) {
            File::ensureDirectoryExists(base_path('resources/views/components/layouts'));
            File::put(
                path: base_path('resources/views/components/layouts/app.blade.php'),
                contents: File::get(__DIR__.'/../../stubs/resources/views/components/layouts/app.blade.php')
            );
            info('✅  App layout component created.');
        }
    }

    protected function installTailwind()
    {
        note('🛠️  Checking Tailwind CSS installation...');

        $this->tailwindPackagesInstalled();
        $this->tailwindInAppCss();
        $this->ensureSourceForVendorContentInCss();
        $this->ensureColorsImportedInAppCss();
    }

    protected function ensureSourceForVendorContentInCss()
    {
        $expectedLine = "@source '../../vendor/bearly/ui/**/*.{php,blade.php,js}';";
        $appCssFile = File::get(base_path('resources/css/app.css'));
        if (! str($appCssFile)->contains($expectedLine)) {
            File::put(base_path('resources/css/app.css'), str($appCssFile)->append($expectedLine."\n"));
        }
    }

    protected function ensureColorsImportedInAppCss()
    {
        $expectedLine = "@import '../../vendor/bearly/ui/css/colors.css';";
        $appCssFile = File::get(base_path('resources/css/app.css'));
        if (! str($appCssFile)->contains($expectedLine)) {
            File::put(base_path('resources/css/app.css'), str($appCssFile)->append($expectedLine."\n"));
        }
    }

    protected function tailwindPackagesInstalled()
    {
        $tailwindAndRequirementsInstalled = str(File::get(base_path('package.json')))
            ->containsAll([
                '"tailwindcss":',
                '"@tailwindcss/vite":',
                '"@tailwindcss/forms":',
            ]);

        if (! $tailwindAndRequirementsInstalled) {
            if (confirm('⛔️  Tailwind CSS and/or its required packages aren\'t installed. Do you want to install them now?')) {
                spin(function () {
                    Process::run('npm i tailwindcss @tailwindcss/vite @tailwindcss/forms')->throw();
                    info('✅  Installed Tailwind CSS');
                }, 'Installing Tailwind CSS');
            }
        }
    }

    protected function tailwindInAppCss()
    {
        $appCssFile = File::get(base_path('resources/css/app.css'));
        if (! str($appCssFile)->contains("@import 'tailwindcss';")) {
            File::put(
                path: base_path('resources/css/app.css'),
                contents: str($appCssFile)->prepend("@import 'tailwindcss'\n")
            );
        }
    }
}
