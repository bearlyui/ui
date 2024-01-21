<?php

namespace Bearly\Ui\Commands;

use Illuminate\Console\Command;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\info;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\note;
use function Laravel\Prompts\table;
use function Laravel\Prompts\text;
use function Laravel\Prompts\warning;

class Install extends Command
{
    public $signature = 'bear-ui:install';

    public $allComponents = [
        'alert' => 'Alert',
        'card' => 'Card',
        'button' => 'Button',
        'form-inputs' => 'Form Inputs',
        'dropdown' => 'Dropdown',
        'tooltip' => 'Tooltip',
    ];

    public function handle()
    {
        // Welcome art and greeting
        $this->welcome();

        // Choose components
        $componentsToPublish = multiselect(
            label: 'Which components would you like to publish?',
            options: $this->allComponents,
            default: ['alert', 'card', 'button', 'form-inputs', 'dropdown', 'tooltip'],
            scroll: 10,
            hint: 'Spacebar to select, Enter to confirm.'
        );

        // Publish location
        $publishTo = text(
            label: 'Where should the blade files be published?',
            default: 'resources/views/components',
            hint: 'Relative to the base path of your Laravel app.'
        );

        // Confirmation
        $confirmed = confirm(
            label: sprintf('Publish the selected components to %s?', $publishTo),
            default: true,
            hint: 'This will not overwrite any existing files. Use the `--force` option to do that.'
        );

        // Publish the components
        if ($confirmed) {
            $this->publish($componentsToPublish, $publishTo);
        }

        warning('Nothing actually happens yet.');
    }

    protected function publish(array $components, string $publishTo)
    {
        info('🫡  Publishing components...');

        foreach ($this->allComponents as $slug => $title) {

            // Skip components that weren't selected to be published
            if (! in_array($slug, $components)) {
                continue;
            }

            // Some files have multiple paths
            foreach ($this->pathsFromSlug($slug) as $path) {
                // Check if the file exists there and skip if it does
                if (file_exists($publishTo.DIRECTORY_SEPARATOR.$path.'.blade.php')) {
                    warning(sprintf('%s already exists. Skipping...', $path));

                    continue;
                }

                // Copy the file from package's folder to the publish location
                note(sprintf('Publishing %s...', $publishTo.DIRECTORY_SEPARATOR.$path.'.blade.php'));
                copy(
                    __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.$path.'.blade.php',
                    $publishTo.DIRECTORY_SEPARATOR.$path.'.blade.php'
                );

            }
        }

        table(
            ['Component', 'Result', 'Published To'],
            collect($this->allComponents)->map(fn ($title, $slug) => [
                $title,
                in_array($slug, $components) ? '✅' : '❌',
                in_array($slug, $components) ? $publishTo.DIRECTORY_SEPARATOR.$slug.'.blade.php' : '',
            ])
        );
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

    protected function welcome()
    {
        info(PHP_EOL.'Welcome to Bear UI! 🐻‍❄️');
        note('Disable components you don\'t need, or hit Enter to publish them all.');
    }
}
