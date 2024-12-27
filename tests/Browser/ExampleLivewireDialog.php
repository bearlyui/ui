<?php

namespace Bearly\Ui\Tests\Browser;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class ExampleLivewireDialog extends Component
{
    public $dialogOpenInLivewire = false;

    public function toggleDialog()
    {
        $this->dialogOpenInLivewire = ! $this->dialogOpenInLivewire;
    }

    public function render()
    {
        return Blade::render(<<<'HTML'
            <div>
                <ui:dialog dusk="dialog" wire:model="dialogOpenInLivewire">
                    <x-slot:trigger>
                        <ui:button dusk="trigger">Open Dialog</ui:button>
                    </x-slot:trigger>
                    Dialog Content
                </ui:dialog>
                <ui:button dusk="toggle" wire:click="toggleDialog">Toggle Dialog</ui:button>
            </div>
        HTML);
    }
}
