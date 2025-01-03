<?php

namespace Bearly\Ui\Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Laravel\Dusk\Browser;
use Orchestra\Testbench\Dusk\Options;
use Orchestra\Testbench\Dusk\TestCase;

use function Livewire\trigger;

class BrowserTestCase extends TestCase
{
    protected $browserHandle;

    /**
     * Huge thanks to Caleb Porzio and the Livewire source code for this boilerplate!
     * We must trigger both events to make Livewire::visit work correctly. We also
     * need `tweakApplicationHook` method to be defined for those events to work.
     */
    public static function tweakApplicationHook()
    {
        return function () {};
    }

    protected function setUp(): void
    {
        parent::setUp();

        trigger('browser.testCase.setUp', $this);
    }

    protected function tearDown(): void
    {
        trigger('browser.testCase.tearDown', $this);

        parent::tearDown();
    }

    /**
     * Use withoutUI to prevent the browser from opening up.
     */
    public static function defineWebDriverOptions()
    {
        Options::withUI();
    }

    /**
     * Set up the environment for the tests.
     */
    protected function defineEnvironment($app)
    {
        $app['config']->set('view.paths', [__DIR__.'/views', resource_path('views')]);
        $app['config']->set('app.key', 'base64:mtRfAnfSSDRoAtc6yu9X6IlQEk4u6HyZKkz0Pp8Vm2o=');
        Route::get('/_test_ui/scripts.js', fn () => File::get(__DIR__.'/../dist/ui.min.js'));
        Route::post('/_test_ui/post-dumper', fn () => request()->input());
    }

    protected function getPackageProviders($app)
    {
        return [
            \Bearly\Ui\BearUiProvider::class,
            \Livewire\LivewireServiceProvider::class,
            \Bearly\Ui\Tests\Browser\BrowserTestingProvider::class,
        ];
    }

    /**
     * Render a Blade template, then open a browser and navigate to its route.
     */
    protected function blade(string $template)
    {
        $this->beforeServingApplication(function () use ($template) {
            Artisan::call('view:clear');
            Route::view('/_test_ui', 'render-blade-template', ['slot' => $template])->middleware('web');
        });

        $this->browse(function (Browser $browser) {
            $this->browserHandle = $browser->visit('/_test_ui');
        });

        return $this->browserHandle;
    }
}
