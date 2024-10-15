<?php

namespace Bearly\Ui\Commands;

use Bearly\Ui\Welcome;
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
        Artisan::call('view:clear');
        // TODO: build assets?

        info('✅  Bear UI installation complete. Enjoy! 🐻');
    }

    protected function ensureJsFileHasValues(string $path, string $key, array $values)
    {
        $jsFile = File::get(base_path($path));
        $arrayFromFile = str($jsFile)->match("/{$key}:[\s]*?\[.*?\],?/sm")
            ->after('[')
            ->beforeLast(']')
            ->replaceMatches('/\s/', '')
            ->trim()
            ->explode(',')
            ->filter()
            ->push($values)
            ->flatten()
            ->unique();

        File::put(
            path: base_path($path),
            contents: str($jsFile)->replaceMatches(
                "/{$key}:[\s]*?\[.*?\],?/sm",
                str("{$key}: [\n    ")->append($arrayFromFile->implode(",\n    "))->append("\n  ],")

            )
        );
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
        $this->ensureTailwindConfigHasColorsImported();
        $this->ensureTailwindConfigHasUiVendorContent();
        $this->ensureTailwindConfigHasColorsExtended();
    }

    protected function ensureTailwindConfigHasColorsImported()
    {
        $tailwindConfig = File::get(base_path('tailwind.config.js'));

        if (! str($tailwindConfig)->contains("import colors from 'tailwindcss/colors'")) {
            File::put(base_path('tailwind.config.js'), "import colors from 'tailwindcss/colors'\n\n".$tailwindConfig);
        }
    }

    protected function ensureTailwindConfigHasUiVendorContent()
    {
        $this->ensureJsFileHasValues('tailwind.config.js', 'content', ["'./resources/**/*.blade.php'", "'./app/**/*.php'", "'./vendor/bearly/ui/resources/**/*.blade.php'"]);
    }

    protected function ensureTailwindConfigHasColorsExtended()
    {
        $tailwindConfig = File::get(base_path('tailwind.config.js'));

        $defaultColors = [
            'primary' => 'colors.cyan',
            'secondary' => 'colors.slate',
            'success' => 'colors.green',
            'warning' => 'colors.amber',
            'error' => 'colors.red',
        ];

        // Check if the theme.extend.colors section exists
        if (! str($tailwindConfig)->contains('theme: {')) {
            $tailwindConfig = str_replace(
                'export default {',
                "export default {\n  theme: {\n    extend: {\n      colors: {\n      },\n    },\n  },",
                $tailwindConfig
            );
        } elseif (! str($tailwindConfig)->contains('extend: {')) {
            $tailwindConfig = str_replace(
                'theme: {',
                "theme: {\n    extend: {\n      colors: {\n      },\n    },",
                $tailwindConfig
            );
        } elseif (! str($tailwindConfig)->contains('colors: {')) {
            $tailwindConfig = str_replace(
                'extend: {',
                "extend: {\n      colors: {\n      },\n    ",
                $tailwindConfig
            );
        }

        // Prepare the colors string
        $colorsString = '';
        foreach ($defaultColors as $name => $value) {
            $newline = $name === 'error' ? '' : "\n";
            $colorsString .= "        '{$name}': {$value},{$newline}";
        }

        // Replace or add the colors
        $pattern = '/colors:\s*{[^}]*}/s';
        if (preg_match($pattern, $tailwindConfig)) {
            $tailwindConfig = preg_replace($pattern, "colors: {\n{$colorsString}\n      }", $tailwindConfig);
        } else {
            $tailwindConfig = str_replace(
                'colors: {',
                "colors: {\n{$colorsString}\n      ",
                $tailwindConfig
            );
        }

        File::put(base_path('tailwind.config.js'), $tailwindConfig);

        info('✅  Updated Tailwind config with extended colors.');
    }

    protected function tailwindPackagesInstalled()
    {
        $tailwindAndRequirementsInstalled = str(File::get(base_path('package.json')))
            ->containsAll([
                '"tailwindcss":',
                '"@tailwindcss/forms":',
                '"postcss":',
                '"autoprefixer":',
            ]);

        if (! $tailwindAndRequirementsInstalled) {
            if (confirm('⛔️  Tailwind CSS and/or its required packages aren\'t installed. Do you want to install them now?')) {
                spin(function () {
                    Process::run('npm install -D tailwindcss postcss autoprefixer @tailwindcss/forms')->throw();
                    Process::run('npx tailwindcss init -p');
                    info('✅  Installed Tailiwind CSS');
                }, 'Installing Tailiwind CSS');
            }
        }
    }

    protected function tailwindInAppCss()
    {
        $appCssFile = File::get(base_path('resources/css/app.css'));
        if (! str($appCssFile)->contains([
            '@tailwind base',
            '@tailwind components',
            '@tailwind utilities',
        ])) {
            File::put(
                path: base_path('resources/css/app.css'),
                contents: str($appCssFile)->prepend(
                    "\n@tailwind base;\n",
                    "@tailwind components;\n",
                    "@tailwind utilities;\n",
                )
            );
        }
    }

    protected function tailwindConfigContainsNeededValues()
    {
        $tailwindConfig = File::get(base_path('tailwind.config.js'));

        return str($tailwindConfig)->contains([
            './resources/**/*.blade.php',
            './app/**/*.php',
        ]);
    }
}
