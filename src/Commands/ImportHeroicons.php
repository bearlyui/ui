<?php

namespace Bearly\Ui\Commands;

use Illuminate\Console\Command;

class ImportHeroicons extends Command
{
    protected $signature = 'ui:import-heroicons';

    protected $description = 'Import Heroicons';

    public function handle(): void
    {
        dd('import heroicons');
    }
}
