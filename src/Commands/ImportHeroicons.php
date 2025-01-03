<?php

namespace Bearly\Ui\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use function Laravel\Prompts\info;
use function Laravel\Prompts\note;
use function Laravel\Prompts\progress;

class ImportHeroicons extends Command
{
    protected $signature = 'ui:import-heroicons';

    protected $description = 'Import Heroicons';

    public function handle(): void
    {
        note('Fetching Heroicons...');

        // Show loading indicator
        // Fetch the list of icon names
        $icons = str(Http::get('https://unpkg.com/@heroicons/vue/24/outline/index.js')->body())
            ->explode("\n")
            ->map(fn ($line) => str($line)->after('module.exports.')->before('Icon ')->kebab()->toString())
            ->all();

        progress(
            label: 'Importing '.count($icons).' Heroicons',
            steps: $icons,
            callback: function ($icon, $progress) {
                $progress->label('Importing "'.$icon.'"');

                return $this->processIcon($icon);
            }
        );

        info('✅ Heroicons imported successfully!');
    }

    protected function processIcon(string $icon)
    {
        $path = __DIR__."/../../resources/views/components/icon/$icon.blade.php";

        // Ensure the directory exists
        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        $file = fopen($path, 'w');

        // Thank Heroicons for this SVG
        fwrite($file, "{{-- Icon from Heroicons (thank you!) - https://heroicons.com/ --}}\n\n");
        // Write the component header
        fwrite($file, "@props([\n    'variant' => 'outline',\n])\n\n");

        // Write the SVG opening tag with dynamic attributes
        fwrite($file, '<svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" data-slot="icon" data-ui-icon-'.$icon.' {{ $attributes
    ->when(
        $variant === \'outline\',
        fn ($a) => $a->merge([
            \'fill\' => \'none\',
            \'viewBox\' => \'0 0 24 24\',
            \'stroke-width\' => \'1.5\',
            \'stroke\' => \'currentColor\'
        ])->class(\'size-6\')
    )->when(
        $variant === \'solid\', fn ($a) => $a->merge([
            \'viewBox\' => \'0 0 24 24\',
            \'fill\' => \'currentColor\',
        ])->class(\'size-6\')
    )->when(
        $variant === \'mini\', fn ($a) => $a->merge([
            \'viewBox\' => \'0 0 20 20\',
            \'fill\' => \'currentColor\',
        ])->class(\'size-5\')
    )->when(
        $variant === \'micro\', fn ($a) => $a->merge([
            \'viewBox\' => \'0 0 16 16\',
            \'fill\' => \'currentColor\',
        ])->class(\'size-4\')
    ) }}
>'."\n");

        // Write the switch statement
        fwrite($file, "    @switch(\$variant)\n");

        foreach (['solid', 'outline', 'mini', 'micro'] as $index => $variant) {
            $size = match ($variant) {
                'solid', 'outline' => 24,
                'mini' => 20,
                'micro' => 16,
            };

            // Determine the correct folder name
            $folder = match ($variant) {
                'mini', 'micro' => 'solid',
                default => $variant,
            };

            $response = Http::get("https://raw.githubusercontent.com/tailwindlabs/heroicons/refs/heads/master/optimized/$size/$folder/$icon.svg");
            $svg = $response->body();
            // Extract path content from SVG
            $svg = preg_replace('/<svg[^>]*>(.*?)<\/svg>/s', '$1', $svg);

            // Write the case statement
            fwrite($file, "        @case('$variant')");
            fwrite(
                $file,
                str($svg)->replace("\n", '')
                    ->replace('<path', "\n            <path")
                    ->append("\n")
            );
            fwrite($file, str("        @break\n")->when($index < 3, fn ($s) => $s->append("\n")));
        }

        // Close the switch and SVG tag
        fwrite($file, "    @endswitch\n");
        fwrite($file, "</svg>\n");

        fclose($file);
    }
}
