<?php

namespace Bearly\Ui;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BearUiProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->commands([
            Commands\Publish::class,
            Commands\Install::class,
        ]);
        $this->mergeConfigFrom(__DIR__.'/../config/ui.php', 'ui');

        // if local env register icon import command
        if (app()->environment('local')) {
            $this->commands([
                Commands\ImportHeroicons::class,
            ]);
        }

        $this->bootAnonymousComponents();
        $this->bootUiTagCompiler();
    }

    protected function bootAnonymousComponents(): void
    {
        // This must be first for the app-level overrides to take priority
        if (file_exists(resource_path('views/vendor/ui/components'))) {
            Blade::anonymousComponentPath(
                path: resource_path('views/vendor/ui/components'),
                prefix: 'ui'
            );
        }

        Blade::anonymousComponentPath(
            path: __DIR__.'/../resources/views/components',
            prefix: 'ui'
        );

        $this->loadViewsFrom(__DIR__.'/../resources/views/icons', 'ui-icon');
    }

    protected function bootUiTagCompiler(): void
    {
        $compiler = new UiTagCompiler(
            aliases: app('blade.compiler')->getClassComponentAliases(),
            namespaces: app('blade.compiler')->getClassComponentNamespaces(),
            blade: app('blade.compiler')
        );

        app()->bind('ui.compiler', fn () => $compiler);
        app('blade.compiler')->precompiler(fn ($in) => $compiler->compile($in));
    }
}
