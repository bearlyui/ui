<?php

namespace Bearly\Ui\Tests\Browser;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class ExampleLivewireToggleArray extends Component
{
    public $selection = [];

    public $selection2 = [];

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

                @foreach (['one', 'two', 'three'] as $item)
                    <input type="checkbox" value="{{ $item }}" wire:model.live="selection" /> {{ $item }}
                @endforeach

                <div>selection: {{ var_dump($selection) }}</div>
            </div>
        HTML, ['selection' => $this->selection, 'selection2' => $this->selection2]);
    }
}
