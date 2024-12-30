<?php

namespace Bearly\Ui\Tests\Browser;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class ExampleLivewireToggle extends Component
{
    public $toggleState = false;

    public function toggleStatus()
    {
        $this->toggleState = ! $this->toggleState;
    }

    public function render()
    {
        return Blade::render(<<<'HTML'
            <div>
                <ui:toggle dusk="toggle" wire:model="toggleState" />
                <div>
                    <ui:button dusk="toggle-status" wire:click="toggleStatus">Toggle Status</ui:button>
                    PHP STATE: {{ var_dump($toggleState) }}
                </div>
            </div>
        HTML, ['toggleState' => $this->toggleState]);
    }
}
