<?php

namespace Bearly\Ui\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CompileHeroicons extends Command
{
    protected $signature = 'ui:compile-icons';

    protected $description = 'Compile Heroicons outline variants into a sprite sheet';

    public function handle()
    {
        $iconsPath = __DIR__.'/../../../resources/icons/24/outline';
        $iconCount = 0;

        $sprite = '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">';

        foreach (File::files($iconsPath) as $file) {
            $iconCount++;
            $iconName = $file->getFilenameWithoutExtension();
            $svg = File::get($file->getPathname());

            preg_match('/<svg[^>]*viewBox="([^"]*)"[^>]*>(.*?)<\/svg>/s', $svg, $matches);

            if (isset($matches[1], $matches[2])) {
                $viewBox = $matches[1];
                $contents = trim($matches[2]);

                $sprite .= sprintf(
                    '<symbol id="icon-%s" viewBox="%s">%s</symbol>',
                    $iconName,
                    $viewBox,
                    $contents
                );
            }
        }

        $sprite .= '</svg>';

        $outputPath = __DIR__.'/../../../resources/views/sprite.blade.php';
        File::put($outputPath, $sprite);

        $sizeInKb = round(strlen($sprite) / 1024, 2);

        $this->info('Sprite sheet generated successfully!');
        $this->info("Total icons: {$iconCount}");
        $this->info("File size: {$sizeInKb}kb");

        // Also show gzipped size since that's what browsers will download
        $gzippedSize = round(strlen(gzencode($sprite)) / 1024, 2);
        $this->info("Gzipped size: {$gzippedSize}kb");
    }
}
