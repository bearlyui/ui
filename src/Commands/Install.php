<?php

namespace Bearly\Ui\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\note;

class Install extends Command
{
    public $signature = 'bear:install';

    // TODO: Ensure tailwind is actually installed in app.css (with confirmation)
    // TODO: Ensure tailwind is installed with autoprefixer and stuff
    // TODO: Add / initialize an app layout for livewire if one doesn't exist (with confirmation)
    // TODO: Add a test route at / URL to ensure everything is working -- it should go to a demo view that shows some buttons being used
    // TODO: Test that we can do the following: `composer require bearly/ui && php artisan bear-ui:install` and it works with a demo page
    // TODO: Add prefix setting/class/prompt to affect publish path

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
                str("{$key}: [\n    ")->append($arrayFromFile->implode(",\n    "))->append("\n  ],\n")

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
            Process::run('composer require livewire/livewire', function ($type, $output) {
                // echo $output;
            })->throw();
            info('✅  Livewire installed.');
        }
    }

    protected function installTailwind()
    {
        note('🛠️  Checking Tailwind CSS installation...');

        $this->tailwindPackagesInstalled();
        $this->tailwindInAppCss();
        $this->installBearUiTailwindPlugin();
        $this->ensureJsFileHasValues('tailwind.config.js', 'content', ["'./resources/**/*.blade.php'", "'./app/**/*.php'"]);
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
            if (confirm('⛔️  Tailwind CSS and its required packages are not installed. Do you want to install them now?')) {
                Process::run('npm install -D tailwindcss postcss autoprefixer @tailwindcss/forms', function ($type, $output) {
                    // echo $output;
                })->throw();
                info('✅  Installed Tailwind CSS and required packages.');

                Process::run('npx tailwindcss init -p', fn ($type, $output) => null/* note($output)*/);
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

    protected function installBearUiTailwindPlugin()
    {
        if (! File::exists(base_path('tailwind.config.js'))) {
            if (confirm('⛔️  No tailwind.config.js file found. Do you want to create one now?')) {

                // First, publish Tailwind and PostCSS files from tailwind
                Process::run('npx tailwindcss init -p', function (string $type, string $output) {
                    // echo $output;
                })->throw();
            }
        }

        // Get the tailwind config file and check if it has the forms plugin
        $tailwindConfig = str(File::get(base_path('tailwind.config.js')));

        // Do we have the import statement?
        if (! $tailwindConfig->contains("import bearUI from './vendor/bearly/ui/ui'")) {
            $tailwindConfig = $tailwindConfig->prepend("import bearUI from './vendor/bearly/ui/ui'\n");
            File::put(base_path('tailwind.config.js'), $tailwindConfig);
        }
        $this->ensureJsFileHasValues('tailwind.config.js', 'plugins', ['bearUI']);

        info('✅  Bear UI Tailwind CSS plugin installed.');
    }

    public function handle()
    {
        $this->welcome();
        $this->installTailwind();
        $this->newLine(2);
        $this->installLivewire();
        $this->newLine(2);
        $this->call('bear:add', ['--skip-welcome' => true]);
        info('✅  Bear UI installation complete. Enjoy! 🐻');
    }

    protected function welcome()
    {
        echo `printf "\e[49m    \e[38;2;247;155;155;49m▄\e[49m    \e[38;2;202;132;132;49m▄\e[38;2;206;137;128;49m▄\e[49m \e[38;2;255;210;180;49m▄\e[38;2;251;208;157;49m▄\e[49m                          \e[m
\e[49m  \e[38;2;175;55;80;48;2;241;99;120m▄\e[38;2;70;21;47;48;2;212;85;115m▄\e[38;2;41;14;40;48;2;128;59;85m▄\e[38;2;115;39;64;48;2;183;90;109m▄\e[38;2;237;98;110;48;2;206;104;101m▄\e[38;2;238;93;82;48;2;202;95;90m▄\e[38;2;224;108;79;48;2;190;79;58m▄\e[38;2;232;128;78;48;2;193;95;71m▄\e[38;2;237;142;72;48;2;221;151;114m▄\e[38;2;216;120;63;48;2;143;63;60m▄\e[38;2;52;23;29;48;2;133;71;66m▄\e[38;2;96;54;59;48;2;196;135;97m▄\e[38;2;161;114;85;48;2;219;160;106m▄\e[38;2;189;148;90;49m▄\e[49m                        \e[m
\e[49m  \e[38;2;71;25;50;48;2;143;61;88m▄\e[38;2;241;64;135;48;2;112;36;70m▄\e[38;2;89;113;176;48;2;120;51;84m▄\e[38;2;88;154;229;48;2;153;118;143m▄\e[38;2;219;117;161;48;2;221;120;101m▄\e[38;2;226;115;55;48;2;250;158;75m▄\e[38;2;255;177;15;48;2;239;143;43m▄\e[38;2;255;152;66;48;2;203;118;29m▄\e[38;2;245;137;209;48;2;209;137;87m▄\e[38;2;181;209;251;48;2;205;147;113m▄\e[38;2;95;206;209;48;2;178;119;88m▄\e[38;2;131;176;135;48;2;84;58;38m▄\e[38;2;186;117;58;48;2;133;90;66m▄\e[49;38;2;194;134;85m▀\e[49m                        \e[m
\e[49m   \e[38;2;201;17;109;48;2;253;41;149m▄\e[38;2;57;20;95;48;2;139;85;174m▄\e[38;2;127;23;94;48;2;85;60;121m▄\e[38;2;212;48;95;48;2;159;20;84m▄\e[38;2;233;72;47;48;2;204;6;64m▄\e[38;2;232;189;133;48;2;200;110;76m▄\e[38;2;187;97;116;48;2;228;56;87m▄\e[38;2;219;62;184;48;2;199;24;196m▄\e[38;2;96;89;179;48;2;110;130;240m▄\e[38;2;41;80;112;48;2;4;185;230m▄\e[38;2;69;68;81;48;2;22;113;136m▄\e[38;2;86;48;46;48;2;63;42;36m▄\e[49m  \e[m  ░█▀▀█ █▀▀ █▀▀█ █▀▀█ 　 ░█─░█ ▀█▀
\e[49m   \e[38;2;46;17;33;48;2;53;19;41m▄\e[38;2;76;22;44;48;2;41;13;56m▄\e[38;2;50;19;34;48;2;65;11;52m▄\e[38;2;83;50;47;48;2;109;19;46m▄\e[38;2;39;34;46;48;2;124;87;76m▄\e[38;2;47;46;65;48;2;130;105;85m▄\e[38;2;106;92;81;48;2;143;108;82m▄\e[38;2;109;78;57;48;2;115;62;80m▄\e[38;2;44;18;24;48;2;54;33;64m▄\e[38;2;101;35;31;48;2;58;42;56m▄\e[38;2;171;62;49;48;2;134;35;36m▄\e[38;2;154;35;32;48;2;120;37;37m▄\e[49m    \e[m░█▀▀▄ █▀▀ █▄▄█ █▄▄▀ 　 ░█─░█ ░█─
\e[49m   \e[38;2;96;38;53;48;2;70;24;39m▄\e[38;2;99;30;48;48;2;141;52;67m▄\e[38;2;96;31;45;48;2;120;43;65m▄\e[38;2;43;18;27;48;2;99;52;50m▄\e[38;2;75;38;38;48;2;104;64;57m▄\e[38;2;80;53;50;48;2;43;27;34m▄\e[38;2;75;42;37;48;2;131;98;73m▄\e[38;2;66;31;31;48;2;125;84;58m▄\e[38;2;121;53;41;48;2;77;32;31m▄\e[38;2;132;62;47;48;2;176;83;58m▄\e[38;2;134;51;51;48;2;152;37;34m▄\e[38;2;177;70;70;48;2;156;51;46m▄\e[49m    \e[m░█▄▄█ ▀▀▀ ▀──▀ ▀─▀▀ 　 ─▀▄▄▀ ▄█▄
\e[49m   \e[49;38;2;131;57;71m▀\e[38;2;105;33;33;48;2;99;28;36m▄\e[38;2;128;48;53;48;2;89;27;33m▄\e[38;2;115;42;57;48;2;44;19;28m▄\e[38;2;80;27;37;48;2;45;20;29m▄\e[38;2;51;24;33;48;2;60;33;33m▄\e[38;2;56;28;39;48;2;42;21;27m▄\e[38;2;58;24;35;48;2;34;14;25m▄\e[38;2;64;20;30;48;2;113;44;39m▄\e[38;2;126;72;77;48;2;155;79;70m▄\e[49;38;2;149;50;50m▀\e[49m     \e[m
\e[49m     \e[49;38;2;128;33;36m▀\e[49;38;2;110;25;33m▀\e[38;2;157;62;77;48;2;91;27;38m▄\e[38;2;90;38;43;48;2;62;24;32m▄\e[38;2;66;33;36;48;2;66;33;42m▄\e[49;38;2;76;35;43m▀\e[49;38;2;132;38;46m▀\e[49m                            \e[m
\e[49m                                        \e[m
        ";`;

        // note(<<<'TEXT'
        // ░█▀▀█ █▀▀ █▀▀█ █▀▀█ 　 ░█─░█ ▀█▀
        // ░█▀▀▄ █▀▀ █▄▄█ █▄▄▀ 　 ░█─░█ ░█─
        // ░█▄▄█ ▀▀▀ ▀──▀ ▀─▀▀ 　 ─▀▄▄▀ ▄█▄
        // TEXT);
    }
}
