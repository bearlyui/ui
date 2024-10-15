<?php

namespace Bearly\Ui\Commands;

use Bearly\Ui\Welcome;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\note;
use function Laravel\Prompts\table;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

class Publish extends Command
{
    use Welcome;

    public $signature = 'bear:publish
        {--skip-welcome : Skip the welcome message}';

    public $allComponents = [
        'alert' => 'Alert',
        'card' => 'Card',
        'button' => 'Button',
        'form-inputs' => 'Form Inputs',
        'dropdown' => 'Dropdown',
        'toggle' => 'Toggle',
        'tooltip' => 'Tooltip',
    ];

    public function handle()
    {
        $this->welcome();

        // Publish location
        note('🗡️  Where should the blade components be published?');
        $publishTo = text(
            label: 'Blade Component Publish Path',
            default: 'resources/views/components',
            hint: 'Relative to the base path of your Laravel app.'
        );
        $this->newLine();

        // Choose components
        note('📦  Choose components to publish.');
        $componentsToPublish = multiselect(
            label: 'Choose components or press enter publish all',
            options: $this->allComponents,
            default: ['alert', 'card', 'button', 'form-inputs', 'dropdown', 'tooltip'],
            scroll: 10,
            hint: 'Spacebar to select, Enter to confirm.'
        );
        $this->newLine();

        // Publish the components
        if (confirm(
            label: sprintf('Publish selected components to %s?', $publishTo),
            default: true,
        )) {
            $this->publish($componentsToPublish, $publishTo);
        }
        $this->newLine();
    }

    protected function publish(array $components, string $publishTo)
    {
        info('🫡  Publishing...');

        foreach ($this->allComponents as $slug => $title) {

            // Skip components that weren't selected to be published
            if (! in_array($slug, $components)) {
                continue;
            }

            $publishToPath = base_path($publishTo.DIRECTORY_SEPARATOR);

            // Some files have multiple paths
            foreach ($this->pathsFromSlug($slug) as $path) {

                // Create the folder if it doesn't exist
                if (! File::isDirectory(str($publishToPath.$path)->beforeLast(DIRECTORY_SEPARATOR))) {
                    File::makeDirectory(
                        path: str($publishToPath.$path)->beforeLast(DIRECTORY_SEPARATOR),
                        recursive: true
                    );
                }

                if (file_exists($publishToPath.$path.'.blade.php')) {
                    if (! confirm(
                        sprintf('%s%s%s.blade.php already exists. Overwrite?', $publishTo, DIRECTORY_SEPARATOR, $path),
                        default: false
                    )) {
                        warning(sprintf('⚠️  Skipping %s...', str($path)->headline()));

                        continue;
                    }
                }

                // Copy the file from package's folder to the publish location
                // note(sprintf('Publishing %s%s%s.blade.php...', $publishTo, DIRECTORY_SEPARATOR, $path));
                copy(
                    __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.$path.'.blade.php',
                    $publishToPath.$path.'.blade.php'
                );

            }
        }

        info('🎉  Done! Published selected components.');
        table(
            ['Component', 'Result', 'Published To'],
            collect($this->allComponents)->map(fn ($title, $slug) => [
                $title,
                in_array($slug, $components) ? '✅' : '❌',
                in_array($slug, $components) ? $publishTo.DIRECTORY_SEPARATOR.$slug.'.blade.php' : '',
            ])
        );

        $this->newLine();

        $runNpmBuild = confirm(
            label: 'Compile assets with `npm run build`?',
            default: true,
            hint: 'Tailwind needs to rebuild to include the new components.'
        );

        // Run npm build
        if ($runNpmBuild) {
            info(`npm run build`);
        }

    }

    protected function pathsFromSlug($slug): array
    {
        return match ($slug) {
            'dropdown' => [
                'dropdown'.DIRECTORY_SEPARATOR.'index',
                'dropdown'.DIRECTORY_SEPARATOR.'item',
            ],
            'form-inputs' => [
                'checkbox',
                'fieldset',
                'input-error',
                'input-group',
                'input',
                'label',
                'radio',
                'select',
                'textarea',
            ],
            'tooltip' => ['tooltip', 'kbd'],
            'toggle-switch' => ['toggle'],
            default => [$slug],
        };
    }
}
