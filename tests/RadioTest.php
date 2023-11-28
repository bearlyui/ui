<?php

namespace Bearly\Ui\Tests;

use Livewire\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertNotTrue;

class RadioTest extends TestCase {
    public function test_renders() {
        $this->blade('<x-ui::radio />')->assertSeeHtml('<input type="radio"');
    }

    public function test_other_attributes()
    {
        $this->blade('<x-ui::radio thing="amajig" />')->assertSeeHtml('thing="amajig"');
    }

    public function test_checked_prop_specifies_checked_attribute()
    {
        $this->blade('<x-ui::radio :checked="true" />')->assertSeeHtml('checked');
        $this->blade('<x-ui::radio :checked="false" />')->assertDontSeeHtml('checked');
    }

    public function test_bound_to_old_input_by_default()
    {
        Route::get('/tests/input', fn () => Blade::render('<x-ui::radio name="foo" value="bar" />'))->middleware('web');

        // Should be checked from old input
        session()->flash('_old_input', ['foo' => 'bar']);
        $this->get('/tests/input')
            ->assertSeeHtml('name="foo"')
            ->assertSeeHtml('checked');
    }

    public function test_old_input_used_when_checked_attribute_true()
    {
        Route::get('/tests/input', fn () => Blade::render('<x-ui::radio :checked="false" name="foo" value="bar" />'))->middleware('web');
        session()->flash('_old_input', ['foo' => 'bar']);
        $this->get('/tests/input')
            ->assertSeeHtml('name="foo"')
            ->assertSeeHtml('checked');
    }

    public function test_old_input_unchecks_when_checked_attribute_true()
    {
        Route::get(
            '/tests/input',
            fn () => Blade::render('<x-ui::radio :checked="true" name="foo" value="bar" />')
        )->middleware('web');
        session()->flash('_old_input', ['foo' => 'bar2']);
        $this->get('/tests/input')
            ->assertSeeHtml('name="foo"')
            ->assertDontSeeHtml('checked');
    }

    public function test_wire_model_works_in_livewire_component()
    {
        Livewire::test(RadioTestComponent::class)
            ->call('update')
            ->assertSeeHtml('wire:model="thing"')
            ->assertDontSeeHtml('checked')
            ->assertHasErrors('thing');
    }
}

class RadioTestComponent extends Component {
    public $thing = false;

    public function update()
    {
        $this->validate([
            'thing' => 'accepted',
        ]);
    }

    public function render()
    {
        return '<x-ui::radio wire:model="thing" />';
    }
}
