<?php

namespace Bearly\Ui\Tests;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\Livewire;

class TextareaTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<x-textarea />')->assertSeeHtml('<textarea');
        $this->blade('<x-textarea wire:model="thing" />')->assertSeeHtml('<textarea');
    }

    public function test_other_attributes()
    {
        $this->blade('<x-textarea thing="amajig" />')->assertSeeHtml('thing="amajig"');
    }

    public function test_bound_to_old_input_by_default()
    {
        Route::get('/tests/input', fn () => Blade::render('<x-textarea name="bogus" />'))->middleware('web');
        session()->flash('_old_input', ['bogus' => 'dude']);
        $this->get('/tests/input')
            ->assertSeeHtml('name="bogus"')
            ->assertSeeHtml('>dude</textarea>');
    }

    public function test_wire_model_works_in_livewire_component()
    {
        Livewire::test(TextareaTestComponent::class)
            ->set('dude', 'bogus')
            ->call('update')
            ->assertSeeHtml('wire:model="dude"')
            ->assertHasErrors('dude');
    }
}

class TextareaTestComponent extends Component
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
        return '<x-textarea wire:model="dude" />';
    }
}
