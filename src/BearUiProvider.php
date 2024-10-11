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

        $compiler = new UiTagCompiler(
            app('blade.compiler')->getClassComponentAliases(),
            app('blade.compiler')->getClassComponentNamespaces(),
            app('blade.compiler')
        );

        app()->bind('ui.compiler', fn () => $compiler);
        app('blade.compiler')->precompiler(fn ($in) => $compiler->compile($in));
    }
}
