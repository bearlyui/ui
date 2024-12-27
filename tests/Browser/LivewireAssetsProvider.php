<?php

namespace Bearly\Ui\Tests\Browser;

use Illuminate\Support\ServiceProvider;

class LivewireAssetsProvider extends ServiceProvider
{
    public function boot()
    {
        \Livewire\Livewire::forceAssetInjection();
        \Livewire\Livewire::component('example-livewire-dialog', ExampleLivewireDialog::class);
    }
}
