<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class DropdownTest extends BrowserTestCase
{
    protected function dropdown()
    {
        return $this->blade(<<<'HTML'
            <ui:dropdown dusk="dropdown">
                <x-slot:trigger dusk="trigger-span">
                    <ui:button dusk="trigger">Open Dropdown</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item">Example Item</ui:dropdown-item>
            </ui:dropdown>
        HTML);
    }

    public function test_can_be_rendered()
    {
        $this->dropdown()
            ->assertVisible('@trigger')
            ->assertMissing('[x-bind="uiDropdownContent"]');
    }

    public function test_can_be_opened()
    {
        $this->dropdown()
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->assertVisible('[x-bind="uiDropdownContent"]')
            ->assertSee('Example Item');
    }

    public function test_can_be_closed()
    {
        $this->dropdown()
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->click('@trigger')
            ->waitUntilMissing('[x-bind="uiDropdownContent"]')
            ->assertMissing('[x-bind="uiDropdownContent"]')
            ->assertFocused('@trigger');
    }

    public function test_can_close_by_clicking_outside()
    {
        $this->dropdown()
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->clickAtPoint(10, 10)
            ->waitUntilMissing('[x-bind="uiDropdownContent"]')
            ->assertMissing('[x-bind="uiDropdownContent"]')
            ->assertFocused('@trigger');
    }

    public function test_can_close_with_escape_key()
    {
        $this->dropdown()
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->pressEscape()
            ->waitUntilMissing('[x-bind="uiDropdownContent"]')
            ->assertFocused('@trigger');
    }

    public function test_trigger_element_gets_aria_attributes()
    {
        $this->dropdown()
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->assertAttribute('@trigger-span', 'aria-expanded', 'true')
            ->assertAttribute('@trigger-span', 'aria-haspopup', 'true')
            ->assertAttribute('@trigger-span', 'aria-controls', 'dropdown-items-1');
    }

    public function test_can_navigate_items_with_keyboard()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown dusk="dropdown">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dropdown</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item1">Item 1</ui:dropdown-item>
                <ui:dropdown-item dusk="item2">Item 2</ui:dropdown-item>
                <ui:dropdown-item dusk="item3">Item 3</ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->assertFocused('@item1')
            ->keys('@item1', ['{arrow_down}'])
            ->assertFocused('@item2')
            ->keys('@item2', ['{arrow_down}'])
            ->assertFocused('@item3')
            ->keys('@item3', ['{arrow_up}'])
            ->assertFocused('@item2')
            ->keys('@item2', ['{arrow_up}'])
            ->assertFocused('@item1');
    }

    public function test_can_search_items_by_typing()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown dusk="dropdown">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dropdown</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="apple">Apple</ui:dropdown-item>
                <ui:dropdown-item dusk="banana">Banana</ui:dropdown-item>
                <ui:dropdown-item dusk="cherry">Cherry</ui:dropdown-item>
                <ui:dropdown-item dusk="bandana">Bandana</ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->withKeyboard(fn ($k) => $k->type('b'))
            ->pause(500)
            ->assertFocused('@banana')
            ->withKeyboard(fn ($k) => $k->sendKeys('band'))
            ->pause(500)
            ->assertFocused('@bandana');
    }

    public function test_different_positions()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown position="top" dusk="dropdown">
                <x-slot:trigger dusk="trigger-span">
                    <ui:button dusk="trigger">Open Dropdown</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item">Example Item</ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->assertSourceHas('x-anchor.top.offset.4');
    }

    public function test_can_set_offset()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown position="top" offset="99" dusk="dropdown">
                <x-slot:trigger dusk="trigger-span">
                    <ui:button dusk="trigger">Open Dropdown</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item">Example Item</ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->assertSourceHas('x-anchor.top.offset.99');
    }
}
