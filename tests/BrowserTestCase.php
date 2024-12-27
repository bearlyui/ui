<?php

namespace Bearly\Ui\Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Laravel\Dusk\Browser;
use Orchestra\Testbench\Dusk\Options;
use Orchestra\Testbench\Dusk\TestCase;

class BrowserTestCase extends TestCase
{
    protected $browserHandle;

    protected function setUp(): void
    {
        parent::setUp();
        exec('npm run build');
        Artisan::call('view:clear');
    }

    public static function defineWebDriverOptions()
    {
        // To show the UI during testing
        Options::withUI();
    }

    protected function defineEnvironment($app)
    {
        $app['config']->set('view.paths', [__DIR__.'/views', resource_path('views')]);

        $app['config']->set('app.key', 'base64:mtRfAnfSSDRoAtc6yu9X6IlQEk4u6HyZKkz0Pp8Vm2o=');

        Route::get('/_test_ui/scripts.js', fn () => File::get(__DIR__.'/../dist/ui.min.js'));
    }

    protected function getPackageProviders($app)
    {
        return [
            \Bearly\Ui\BearUiProvider::class,
            \Livewire\LivewireServiceProvider::class,
        ];
    }

    protected function blade(string $template)
    {
        $this->beforeServingApplication(function () use ($template) {
            Artisan::call('view:clear');
            Route::view('/_test_ui', 'render-blade-template', ['slot' => $template]);
        });

        $this->browse(function (Browser $browser) {
            $this->browserHandle = $browser->visit('/_test_ui');
        });

        return $this->browserHandle;
    }
}
