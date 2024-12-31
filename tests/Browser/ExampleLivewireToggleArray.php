<?php

namespace Bearly\Ui\Tests\Browser;

use Illuminate\Support\Facades\Blade;
use Livewire\Component;

class ExampleLivewireToggleArray extends Component
{
    public $selection = [];

    public function render()
    {
        return Blade::render(<<<'HTML'
            <div>
                <ui:group wire:model="selection" class="flex flex-col gap-2 p-5">
                    @foreach (['one', 'two', 'three'] as $item)
                        <div class="flex items-center gap-2" wire:key="{{ $item }}">
                            <ui:toggle dusk="toggle-{{ $item }}" wire:key="{{ $item }}" :value="$item" /> {{ $item }}
                        </div>
                    @endforeach
                </ui:group>

                <div>selection: {{ var_dump($selection) }}</div>
            </div>
        HTML, ['selection' => $this->selection]);
    }
}
