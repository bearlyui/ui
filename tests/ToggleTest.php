<?php

namespace Bearly\Ui\Tests;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

class ToggleTest extends TestCase
{
    public function test_renders()
    {
        $this->blade('<x-toggle />')->assertSeeHtmlInOrder([
            '<button', 'role="switch"', 'checked:', '>',
        ]);
    }

    public function test_other_attributes()
    {
        $this->blade('<x-toggle thing="amajig" />')->assertSeeHtmlInOrder([
            '<button',
            'thing="amajig"',
            '>',
        ]);
    }

    public function test_backed_by_hidden_input_when_name_attribute_present()
    {
        $this->blade('<x-toggle name="foo" />')->assertSeeHtmlInOrder([
            '<button', 'role="switch"', 'checked:', '>',
            '<input', 'type="checkbox"', 'class="hidden"', 'name="foo"', '>',
        ]);
    }

    public function test_hidden_input_gets_wire_model()
    {
        $this->blade('<x-toggle wire:model="foo" />')->assertSeeHtmlInOrder([
            '<button', 'role="switch"', 'checked:', '>',
        ])->assertSeeHtmlInOrder(['type="checkbox"', 'wire:model="foo"']);
    }

    public function test_hidden_input_gets_value()
    {
        $this->blade('<x-toggle name="foo" value="bar" />')->assertSeeHtml([
            '<input', 'type="checkbox"', 'class="hidden"', 'name="foo"', 'value="bar"', '>',
        ]);
    }

    // Still need to write tests for:
    // checked prop
    public function test_checked_prop()
    {
        $this->blade('<x-toggle :checked="true" />')->assertSeeHtmlInOrder([
            '<button', 'role="switch"', 'checked: true', '>',
        ]);
        $this->blade('<x-toggle :checked="false" />')->assertSeeHtmlInOrder([
            '<button', 'role="switch"', 'checked: false', '>',
        ]);
    }

    public function test_icon_slots()
    {
        $this->blade('<x-toggle icon-on="foo-icon" icon-off="bar-icon" />')->assertSeeHtmlInOrder([
            '<button', 'role="switch"', 'checked:', '>',
            'foo-icon', 'bar-icon',
        ]);
    }

    public function test_bound_to_old_input_by_default()
    {
        Route::get('/_test', fn () => Blade::render('<x-toggle name="foo" />'))->middleware('web');

        // Should be checked from old input
        session()->flash('_old_input', ['foo' => true]);
        $this->get('/_test')
            ->assertSeeHtml('name="foo"')
            ->assertSeeHtmlInOrder([
                '<input', 'type="checkbox"', 'class="hidden"', 'checked', 'name="foo"', '>',
            ]);
    }

    public function test_old_input_overrides_value_prop()
    {

        // Should be checked from old input
        Route::get('/_test', fn () => Blade::render('<x-toggle name="foo" value="bar" />'))->middleware('web');
        session()->flash('_old_input', ['foo' => true]);
        $this->get('/_test')
            ->assertSeeHtml('name="foo"')
            ->assertSeeHtmlInOrder([
                'checked: true',
                '<input', 'type="checkbox"', 'class="hidden"', 'name="foo"', '>',
            ]);

        // Should be unchecked from old input
        Route::get('/_test', fn () => Blade::render('<x-toggle name="foo" value="bar" />'))->middleware('web');
        session()->flash('_old_input', ['foo' => false]);
        $this->get('/_test')
            ->assertSeeHtml('name="foo"')
            ->assertSeeHtmlInOrder([
                'checked: false',
                '<input', 'type="checkbox"', 'class="hidden"', 'name="foo"', '>',
            ]);
    }
}
