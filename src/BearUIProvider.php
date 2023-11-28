<?php

namespace Bearly\Ui;

use Illuminate\Support\ServiceProvider;

class BearUIProvider extends ServiceProvider {

    function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'ui');
        $this->mergeConfigFrom(__DIR__.'/../config/ui.php', 'ui');
    }
}
