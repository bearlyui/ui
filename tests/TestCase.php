<?php

namespace Bearly\Ui\Tests;

use Bearly\Ui\BearUiProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Livewire\LivewireServiceProvider;

class TestCase extends Orchestra
{
    use InteractsWithViews;

    protected function setUp(): void
    {
        parent::setUp();

        // Factory::guessFactoryNamesUsing(
        //     fn (string $modelName) => 'VendorName\\Skeleton\\Database\\Factories\\'.class_basename($modelName).'Factory'
        // );
    }

    protected function getPackageProviders($app)
    {
        return [
            BearUiProvider::class,
            LivewireServiceProvider::class,
            HtmlTestingAssertionsProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        // config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_skeleton_table.php.stub';
        $migration->up();
        */
    }
}
