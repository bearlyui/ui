<?php

namespace Bearly\Ui\Tests\Browser;

use Livewire\Component;

class ExampleLivewireToggleSingleError extends Component
{
    public $toggleState = false;

    public function submit()
    {
        $this->validate([
            'toggleState' => 'accepted',
        ]);

        dd('validation passed');
    }

    public function render()
    {
        return <<<'HTML'
            <div>
                <form wire:submit="submit">
                    <ui:toggle dusk="toggle" value="thing" wire:model.live="toggleState" /> Thing
                    <ui:button dusk="submit" type="submit">Submit</ui:button>
                </form>
            </div>
            HTML;
    }
    // @dump($errors?->default?->messages() ?? ['none'])
    // <div>@error('toggleState') {{ $message }} @enderror</div>
}
