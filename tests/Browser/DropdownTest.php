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
            ->pause(200)
            ->assertFocused('@item2')
            ->keys('@item2', ['{arrow_down}'])
            ->pause(200)
            ->assertFocused('@item3')
            ->keys('@item3', ['{arrow_up}'])
            ->pause(200)
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

    public function test_can_navigate_to_first_and_last_items()
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
            ->keys('@item1', ['{end}'])
            ->pause(200)
            ->assertFocused('@item3')
            ->keys('@item3', ['{home}'])
            ->pause(200)
            ->assertFocused('@item1')
            ->keys('@item1', ['{page_down}'])
            ->pause(200)
            ->assertFocused('@item3')
            ->keys('@item3', ['{page_up}'])
            ->pause(200)
            ->assertFocused('@item1');
    }

    public function test_can_navigate_with_left_and_right_arrows()
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
            ->keys('@item1', ['{arrow_right}'])
            ->pause(200)
            ->assertFocused('@item2')
            ->keys('@item2', ['{arrow_left}'])
            ->pause(200)
            ->assertFocused('@item1');
    }

    public function test_can_select_item_with_space_and_enter()
    {
        $this->blade(<<<'HTML'
            <div x-data="{ clicked: false }">
                <ui:dropdown dusk="dropdown">
                    <x-slot:trigger>
                        <ui:button dusk="trigger">Open Dropdown</ui:button>
                    </x-slot:trigger>
                    <ui:dropdown-item dusk="item1" x-on:click="clicked = 'item1'">Item 1</ui:dropdown-item>
                    <ui:dropdown-item dusk="item2" x-on:click="clicked = 'item2'">Item 1</ui:dropdown-item>
                </ui:dropdown>
                <span dusk="result" x-text="clicked"></span>
            </div>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->assertFocused('@item1')
            ->keys('@item1', ['{space}'])
            ->assertSeeIn('@result', 'item1')
            ->keys('@item2', ['{enter}'])
            ->assertSeeIn('@result', 'item2');

    }

    public function test_item_renders_as_button_by_default()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown>
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item">Item</ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->assertVisible('@item')
            ->assertPresent('button[dusk="item"]')
            ->assertAttribute('@item', 'type', 'button');
    }

    public function test_item_renders_as_link_with_href()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown>
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item" href="/test">Item</ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->assertVisible('@item')
            ->assertPresent('a[dusk="item"]')
            ->assertAttribute('@item', 'href', 'http://127.0.0.1:8001/test');
    }

    public function test_item_renders_icon_before()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown>
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item" icon="check"><span>Item</span></ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->assertVisible('@item')
            ->assertVisible('@item [data-ui-icon-check]')
            ->assertMissing('.justify-self-end');
    }

    public function test_item_renders_icon_after()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown>
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item" icon-after="arrow-right"><span>Item</span></ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->assertVisible('@item')
            ->assertVisible('@item [data-ui-icon-arrow-right]')
            ->assertPresent('.justify-self-end');
    }

    public function test_item_dismiss_property_closes_dropdown()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown>
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item" dismiss>Close Menu</ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->click('@item')
            ->waitUntilMissing('[x-bind="uiDropdownContent"]')
            ->assertMissing('[x-bind="uiDropdownContent"]');
    }

    public function test_item_renders_before_and_after_slots()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown>
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item">
                    <x-slot:before>
                        <span dusk="before">Before</span>
                    </x-slot:before>
                    Item
                    <x-slot:after>
                        <span dusk="after">After</span>
                    </x-slot:after>
                </ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->assertSeeIn('@before', 'Before')
            ->assertSeeIn('@after', 'After');
    }

    public function test_item_focus_on_hover_enabled_by_default()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown>
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open</ui:button>
                </x-slot:trigger>
                <ui:dropdown-item dusk="item1">Item 1</ui:dropdown-item>
                <ui:dropdown-item dusk="item2" :focus-on-hover="false">Item 2</ui:dropdown-item>
            </ui:dropdown>
        HTML)
            ->click('@trigger')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->mouseover('@item1')
            ->assertFocused('@item1')
            ->assertNotFocused('@item2')
            ->mouseover('@item2')
            ->assertFocused('@item1')
            ->assertNotFocused('@item2');
    }

    public function test_dropdown_nested_in_dialog_nested_in_dropdown()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown>
                <x-slot:trigger>
                    <ui:button dusk="open-dropdown">Open</ui:button>
                </x-slot:trigger>
                <ui:dialog dusk="dialog">
                    <x-slot:trigger>
                        <ui:button dusk="open-dialog">Open Dialog</ui:button>
                    </x-slot:trigger>
                    <p>Happy Little Dialog</p>
                    <ui:dropdown>
                        <x-slot:trigger>
                            <ui:button dusk="open-dropdown-in-dialog">Open Dropdown in Dialog</ui:button>
                        </x-slot:trigger>
                        <ui:dropdown-item dusk="item">
                            <ui:tooltip dusk="tooltip" title="Tooltipper" />
                            Nested Item
                        </ui:dropdown-item>
                    </ui:dropdown>
                </ui:dialog>
            </ui:dropdown>
        HTML)
            ->click('@open-dropdown')
            ->waitFor('[x-bind="uiDropdownContent"]')
            ->click('@open-dialog')
            ->waitFor('[x-bind="uiDialogContent"]')
            ->assertSee('Happy Little Dialog')
            ->click('@open-dropdown-in-dialog')
            ->waitFor('@item')
            ->assertSee('Nested Item')
            ->clickAndHold('@item')
            ->waitFor('@tooltip')
            ->assertVisible('@tooltip')
            ->releaseMouse();
    }
}
