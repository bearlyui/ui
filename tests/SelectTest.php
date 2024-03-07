<?php

namespace Bearly\Ui\Tests;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\Livewire;

class SelectTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<x-select />')->assertSeeHtml('<select');
    }

    public function test_other_attributes()
    {
        $this->blade('<x-select thing="amajig" />')->assertSeeHtml('thing="amajig"');
    }

    public function test_options_in_slot()
    {
        $this->blade(<<<'HTML'
            <x-select>
                <option value="foo">Foo</option>
                <option value="bar">Bar</option>
            </x-ui::select>
        HTML)
            ->assertSeeHtmlInOrder(['<select', '<option value="foo">Foo</option>', '</select>']);
    }

    public function test_placeholder_prop_works_with_slot()
    {
        $this->blade(<<<'HTML'
            <x-select placeholder="Choose an Option">
                <option value="foo">Foo</option>
                <option value="bar">Bar</option>
            </x-ui::select>
        HTML)
            ->assertSeeHtmlInOrder(['<select', '<option', 'disabled', 'selected', 'Choose an Option', '</option>']);
    }

    public function test_placeholder_prop_works_with_options_prop()
    {
        $this->blade(<<<'HTML'
            <x-select placeholder="Choose an Option" :options="['foo' => 'Foo', 'bar' => 'Bar']" />
        HTML)
            ->assertSeeHtmlInOrder(['<select', '<option', 'disabled', 'selected', 'Choose an Option', '</option>', '<option value="foo"']);
    }

    public function test_uses_options_prop_instead_of_slot()
    {
        $this->blade(<<<'HTML'
                <x-select :options="['baz' => 'Baz']">
                    <option value="foo">Foo</option>
                    <option value="bar">Bar</option>
                </x-ui::select>
            HTML)
            ->assertSeeHtmlInOrder(['<select', '</select>'])
            ->assertDontSeeHtml('Foo')
            ->assertDontSeeHtml('Bar');
    }

    public function test_passing_options_and_selected_prop_selects_correct_option()
    {
        $this->blade(<<<'HTML'
            <x-select :options="['foo' => 'Foo', 'bar' => 'Bar']" selected="bar" />
        HTML)
            ->assertSeeHtmlInOrder(['<select', '<option value="bar" selected>Bar</option>', '</select>']);
    }

    public function test_value_bound_to_old_input_by_default()
    {
        Route::get('/tests/input', fn () => Blade::render(<<<'HTML'
            <x-select name="bogus" :options="['foo' => 'Foo', 'bar' => 'Bar']" />
        HTML))->middleware('web');
        session()->flash('_old_input', ['bogus' => 'bar']);
        $this->get('/tests/input')
            ->assertSeeHtml('name="bogus"')
            ->assertSeeHtmlInOrder(['<option', 'value="foo"', '</option>'])
            ->assertSeeHtmlInOrder(['<option', 'value="bar"', 'selected', '</option>']);
    }

    public function test_wire_model_works_in_livewire_component()
    {
        Livewire::test(SelectTestComponent::class)
            ->assertSeeHtml('wire:model="thing"')
            ->call('update')
            ->assertHasErrors('thing')
            ->set('thing', 'bar')
            ->call('update')
            ->assertHasNoErrors();
    }
}

class SelectTestComponent extends Component
{
    public $thing = null;

    public function update()
    {
        $this->validate([
            'thing' => 'required',
        ]);
    }

    public function render()
    {
        return <<<'HTML'
            <x-select wire:model="thing" :options="['foo' => 'Foo', 'bar' => 'Bar']" />
        HTML;
    }
}
