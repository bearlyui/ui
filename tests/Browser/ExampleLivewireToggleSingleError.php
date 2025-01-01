<?php

namespace Bearly\Ui\Tests\Browser;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class ExampleLivewireToggleSingleError extends Component
{
    public $state = false;

    public function submit()
    {
        $this->validate([
            'state' => 'accepted',
        ]);
        dd('good');
    }

    public function render()
    {
        return Blade::render(<<<'HTML'
            <div>
                <form wire:submit="submit">
                    <input type="checkbox" name="state" wire:model.live="state" />
                    <div>@error('title') {{ $message }} @enderror</div>
                    <ui:button dusk="submit" type="submit">Submit</ui:button>
                </form>
            </div>
            HTML, ['state' => $this->state]);
    }
}
// <ui:toggle dusk="toggle" value="thing" wire:model.live="toggleState" /> Thing
