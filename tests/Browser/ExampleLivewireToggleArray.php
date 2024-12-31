<?php

namespace Bearly\Ui\Tests\Browser;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class ExampleLivewireToggleArray extends Component
{
    public $selection = ['one'];

    public function render()
    {
        return Blade::render(<<<'HTML'
            <div>
                <ui:group class="flex flex-col gap-2 p-5">
                    @foreach (['one', 'two', 'three'] as $item)
                        <div class="flex items-center gap-2" wire:key="{{ $item }}">
                            <ui:toggle dusk="toggle-{{ $item }}" value="{{ $item }}" wire:model.live="selection" /> {{ $item }}
                        </div>
                    @endforeach
                </ui:group>

                <ui:button dusk="set-1-3" wire:click="$set('selection', ['one', 'three'])">Set 1,3</ui:button>
                <ui:button dusk="set-2" wire:click="$set('selection', ['two'])">Set 2</ui:button>
            </div>
            HTML, ['selection' => $this->selection]);
    }
}

// <div class="dark:text-white">selection: @dump($selection)</div>
// @foreach (['one', 'two', 'three'] as $item)
//     <input type="checkbox" value="{{ $item }}" wire:model.live="selection" /> {{ $item }}
// @endforeach
