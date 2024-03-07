<?php

namespace Bearly\Ui\Tests;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\Livewire;

class CheckboxTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<x-checkbox />')->assertSeeHtml('<input type="checkbox"');
    }

    public function test_other_attributes()
    {
        $this->blade('<x-checkbox thing="amajig" />')->assertSeeHtml('thing="amajig"');
    }

    // Test checked prop
    public function test_checked_prop_specifies_checked_attribute()
    {
        $this->blade('<x-checkbox :checked="true" />')->assertSeeHtml('checked');
        $this->blade('<x-checkbox :checked="false" />')->assertDontSeeHtml('checked');
    }

    public function test_bound_to_old_input_by_default()
    {
        Route::get('/tests/input', fn () => Blade::render('<x-checkbox name="bogus" />'))->middleware('web');

        // Should be checked from old input
        session()->flash('_old_input', ['bogus' => true]);
        $this->get('/tests/input')
            ->assertSeeHtml('name="bogus"')
            ->assertSeeHtml('checked');

        // Unsetting the old input should not render the checked attribute
        session()->flash('_old_input', []);
        $this->get('/tests/input')
            ->assertSeeHtml('name="bogus"')
            ->assertDontSeeHtml('checked');
    }

    public function test_old_input_used_when_checked_attribute_true()
    {
        Route::get('/tests/input', fn () => Blade::render('<x-checkbox :checked="false" name="bogus" />'))->middleware('web');
        session()->flash('_old_input', ['bogus' => true]);
        $this->get('/tests/input')
            ->assertSeeHtml('name="bogus"')
            ->assertSeeHtml('checked');
    }

    public function test_old_input_unchecks_when_checked_attribute_true()
    {
        Route::get(
            '/tests/input',
            fn () => Blade::render('<x-checkbox :checked="true" name="bogus" />')
        )->middleware('web');
        session()->flash('_old_input', ['somethin' => 'else']);
        $this->get('/tests/input')
            ->assertSeeHtml('name="bogus"')
            ->assertDontSeeHtml('checked');
    }

    public function test_wire_model_works_in_livewire_component()
    {
        Livewire::test(CheckboxTestComponent::class)
            ->call('update')
            ->assertSeeHtml('wire:model="thing"')
            ->assertDontSeeHtml('checked')
            ->assertHasErrors('thing');
    }
}

class CheckboxTestComponent extends Component
{
    public $thing = false;

    public function update()
    {
        $this->validate([
            'thing' => 'accepted',
        ]);
    }

    public function render()
    {
        return '<x-checkbox wire:model="thing" />';
    }
}
