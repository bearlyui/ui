<?php

namespace Bearly\Ui;

use Illuminate\Support\ServiceProvider;

class BearUiProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->commands([
            Commands\Add::class,
            Commands\Install::class,
        ]);
        $this->mergeConfigFrom(__DIR__.'/../config/ui.php', 'ui');
    }
}
