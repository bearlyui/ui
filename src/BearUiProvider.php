<?php

namespace Bearly\Ui;

use Illuminate\Support\ServiceProvider;

class BearUiProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->commands([Commands\Install::class]);
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ui');
        $this->mergeConfigFrom(__DIR__.'/../config/ui.php', 'ui');
    }
}
