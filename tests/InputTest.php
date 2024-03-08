<?php

namespace Bearly\Ui\Tests;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\Livewire;

class InputTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<x-input />')->assertSeeHtml('<input');
    }

    public function test_other_attributes()
    {
        $this->blade('<x-input thing="amajig" />')->assertSeeHtml('thing="amajig"');
    }

    public function test_default_type_is_text()
    {
        $this->blade('<x-input />')->assertSeeHtml('type="text"');
    }

    public function test_any_other_type()
    {
        $this->blade('<x-input type="yolo" />')->assertSeeHtml('type="yolo"');
    }

    // What we really should be testing here is "value bound automatically if omitted and no wire:model"
    public function test_value_bound()
    {
        $this->blade('<x-input name="bogus" value="bogus" />')
            ->assertSeeHtml('name="bogus"')
            ->assertSeeHtml('value="bogus"');
    }

    public function test_value_not_bound_with_wire_model()
    {
        $this->blade('<x-input wire:model="bogus" value="bogus" />')
            ->assertSeeHtml('wire:model="bogus"')
            ->assertDontSeeHtml('value="bogus"');
    }

    public function test_value_bound_to_old_input_by_default()
    {
        Route::get('/tests/input', fn () => Blade::render('<x-input name="bogus" />'))->middleware('web');
        session()->flash('_old_input', ['bogus' => 'dude']);
        $this->get('/tests/input')
            ->assertSeeHtml('name="bogus"')
            ->assertSeeHtml('value="dude"');
    }

    public function test_wire_model_works_in_livewire_component()
    {
        Livewire::test(InputTestComponent::class)
            ->set('dude', 'bogus')
            ->call('update')
            ->assertSeeHtml('wire:model="dude"')
            ->assertHasErrors('dude');
    }
}

class InputTestComponent extends Component
{
    public $dude = '';

    public function update()
    {
        $this->validate([
            'dude' => 'not_in:bogus',
        ]);
    }

    public function render()
    {
        return '<x-input wire:model="dude" />';
    }
}
