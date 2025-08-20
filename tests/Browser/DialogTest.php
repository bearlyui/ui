<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;
use Livewire\Component;
use Livewire\Livewire;

class DialogTest extends BrowserTestCase
{
    protected function dialog()
    {
        return $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger dusk="trigger-span">
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Hello Dialog
            </ui:dialog>
        HTML);
    }

    public function test_can_be_rendered()
    {
        $this->dialog()
            ->assertVisible('@trigger')
            ->assertMissing('[x-bind="uiDialogOverlay"]')
            ->assertMissing('[x-bind="uiDialogContent"]');
    }

    public function test_can_be_opened()
    {
        $this->dialog()
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->assertVisible('[x-bind="uiDialogOverlay"]')
            ->assertVisible('[x-bind="uiDialogContent"]')
            ->assertSee('Hello Dialog');
    }

    public function test_can_be_closed()
    {
        $this->dialog()
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->click('[x-bind="uiDialogClose"]')
            ->waitUntilMissing('[x-bind="uiDialogOverlay"]')
            ->waitUntilMissing('[x-bind="uiDialogContent"]')
            ->assertMissing('[x-bind="uiDialogOverlay"]')
            ->assertMissing('[x-bind="uiDialogContent"]')
            ->assertVisible('@trigger')
            ->assertDontSee('Hello Dialog')
            ->assertFocused('@trigger');
    }

    public function test_can_close_by_clicking_overlay()
    {
        $this->dialog()
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->waitFor('[x-bind="uiDialogOverlay"]')
            ->clickAtPoint(10, 10)
            ->waitUntilMissing('[x-bind="uiDialogOverlay"]')
            ->waitUntilMissing('[x-bind="uiDialogContent"]')
            ->assertMissing('[x-bind="uiDialogOverlay"]')
            ->assertMissing('[x-bind="uiDialogContent"]')
            ->assertFocused('@trigger');
    }

    public function test_can_close_with_escape_key()
    {
        $this->dialog()
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->pressEscape()
            ->waitUntilMissing('[x-bind="uiDialogOverlay"]')
            ->waitUntilMissing('[x-bind="uiDialogContent"]')
            ->assertFocused('@trigger');
    }

    public function test_first_focusable_element_is_focused_by_default()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Hello Dialog
                <ui:button dusk="first">First</ui:button>
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->waitFor('@first')
            ->pause(200)
            ->assertFocused('@first');
    }

    public function test_sizes()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog" size="sm">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Hello Dialog
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->assertHasClass('[x-bind="uiDialogContent"]', 'sm:max-w-xl');

        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog" size="md">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Hello Dialog
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->assertHasClass('[x-bind="uiDialogContent"]', 'sm:max-w-2xl');

        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog" size="lg">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Hello Dialog
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->assertHasClass('[x-bind="uiDialogContent"]', 'sm:max-w-4xl');

        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog" size="xl">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Hello Dialog
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->assertHasClass('[x-bind="uiDialogContent"]', 'sm:max-w-6xl');

        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog" size="full">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Hello Dialog
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->assertHasClass('[x-bind="uiDialogContent"]', 'sm:max-w-full');
    }

    public function test_header_slot()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                <x-slot:header>Dialog Header</x-slot:header>
                Dialog Content
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Dialog Header')
            ->assertSee('Dialog Header')
            ->assertSee('Dialog Content');
    }

    public function test_footer_slot()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Dialog Content
                <x-slot:footer>Dialog Footer</x-slot:footer>
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Dialog Footer')
            ->assertSee('Dialog Content')
            ->assertSee('Dialog Footer');
    }

    public function test_can_hide_close_button()
    {
        $this->blade(<<<'HTML'
            <ui:dialog :hide-close-button="true" dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Dialog Content
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Dialog Content')
            ->assertMissing('[x-bind="uiDialogClose"]');
    }

    public function test_custom_classes()
    {
        $this->blade(<<<'HTML'
            <ui:dialog
                card-class="test-card-class"
                container-class="test-container-class"
                dusk="dialog"
            >
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Dialog Content
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Dialog Content')
            ->assertHasClass('[x-bind="uiDialogAttributes"]', 'test-container-class')
            ->assertHasClass('[data-ui-card]', 'test-card-class');
    }

    public function test_header_and_footer_classes()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                <x-slot:header class="text-center">
                    <ui:heading>Dialog Header</ui:heading>
                </x-slot:header>
                Dialog Content
                <x-slot:footer class="flex justify-end">
                    <ui:button>Right aligned footer</ui:button>
                </x-slot:footer>
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Dialog Header')
            ->assertHasClass('[data-ui-card-header]', 'text-center')
            ->assertHasClass('[data-ui-card-footer]', 'justify-end');
    }

    public function test_headings_and_subheadings_are_bound_to_aria_labelledby_and_describedby()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                <ui:heading>Dialog Title</ui:heading>
                <ui:subheading>Dialog Subtitle</ui:subheading>
                <ui:heading>Dialog Title 2</ui:heading>
                <ui:subheading>Dialog Subtitle 2</ui:subheading>
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Dialog Title')
            ->assertVisible('#ui-dialog-title-1')
            ->assertVisible('#ui-dialog-description-1')
            ->assertMissing('#ui-dialog-title-2')
            ->assertMissing('#ui-dialog-description-2')
            ->assertAttribute('[x-bind="uiDialogContent"]', 'aria-labelledby', 'ui-dialog-title-1')
            ->assertAttribute('[x-bind="uiDialogContent"]', 'aria-describedby', 'ui-dialog-description-1');
    }

    public function test_multiple_headings_and_subheadings_get_unique_ids()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                <ui:heading>Dialog Title</ui:heading>
                <ui:subheading>Dialog Subtitle</ui:subheading>
            </ui:dialog>
            <ui:dialog dusk="dialog2">
                <x-slot:trigger>
                    <ui:button dusk="trigger2">Open Dialog 2</ui:button>
                </x-slot:trigger>
                <ui:heading>Dialog Title</ui:heading>
                <ui:subheading>Dialog Subtitle</ui:subheading>
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Dialog Title')
            ->assertVisible('#ui-dialog-title-1')
            ->assertVisible('#ui-dialog-description-1')
            ->assertMissing('#ui-dialog-title-2')
            ->assertMissing('#ui-dialog-description-2')
            ->assertAttribute('[x-bind="uiDialogAttributes"] [x-bind="uiDialogContent"]', 'aria-labelledby', 'ui-dialog-title-1')
            ->assertAttribute('[x-bind="uiDialogAttributes"] [x-bind="uiDialogContent"]', 'aria-describedby', 'ui-dialog-description-1')
            ->pressEscape()
            ->pause(300)
            ->click('@trigger2')
            ->waitForText('Dialog Title')
            ->assertVisible('#ui-dialog-title-2')
            ->assertVisible('#ui-dialog-description-2')
            ->assertMissing('#ui-dialog-title-1')
            ->assertMissing('#ui-dialog-description-1')
            ->assertAttribute('[x-bind="uiDialogAttributes"]:last-child [x-bind="uiDialogContent"]', 'aria-labelledby', 'ui-dialog-title-2')
            ->assertAttribute('[x-bind="uiDialogAttributes"]:last-child [x-bind="uiDialogContent"]', 'aria-describedby', 'ui-dialog-description-2');
    }

    // Can't get this one to work due to Dusk prefixing 'body' by default.
    // Changing the prefix manually doesn't seem to work, either!
    // public function test_page_not_scrollable_when_dialog_is_open()
    // {
    //     $this->blade(<<<'HTML'
    //         <div>
    //             <ui:dialog dusk="dialog">
    //                 <x-slot:trigger>
    //                     <ui:button dusk="trigger">Open Dialog</ui:button>
    //                 </x-slot:trigger>
    //                 Dialog Content
    //             </ui:dialog>
    //         </div>
    //     HTML)
    //         ->click('@trigger')
    //         ->waitForText('Dialog Content')
    //         ->assertAttribute('html', 'style', 'overflow: hidden; padding-right: 0px;')
    //         ->pressEscape()
    //         ->assertAttributeMissing('html', 'style');
    // }

    public function test_opening_dialog_makes_sibling_element_inert()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                Dialog Content <ui:button dusk="btn">Button</ui:button>
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Dialog Content')
            ->assertVisible('[x-bind="uiDialogContent"]')
            ->assertFocused('@btn')
            ->assertAriaAttribute(' > div:first-child', 'hidden', 'true')
            ->pressEscape()
            ->assertAttributeMissing(' > div:first-child', 'aria-hidden');
    }

    public function test_works_with_wire_model()
    {
        Livewire::visit(ExampleLivewireDialog::class)
            ->click('@toggle')
            ->waitForText('Dialog Content')
            ->assertVisible('[x-bind="uiDialogContent"]');
    }

    public function test_trigger_element_gets_aria_expanded_and_controls_attributes()
    {
        $this->dialog()
            ->click('@trigger')
            ->waitForText('Hello Dialog')
            ->assertAttribute('@trigger-span', 'aria-expanded', 'true')
            ->assertAttribute('@trigger-span', 'aria-controls', 'ui-dialog-content-1');
    }

    public function test_nesting_works()
    {
        $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
                    <ui:button dusk="trigger">Open Dialog</ui:button>
                </x-slot:trigger>
                <span dusk="content">Dialog Content</span>
                <ui:dialog dusk="dialog2">
                    <x-slot:trigger>
                        <ui:button dusk="trigger2">Open Dialog 2</ui:button>
                    </x-slot:trigger>
                    <span dusk="content2">Dialog Content 2</span>
                </ui:dialog>
            </ui:dialog>
        HTML)
            ->click('@trigger')
            ->waitForText('Dialog Content')
            ->assertVisible('@content')
            ->assertMissing('@content2')
            ->click('@trigger2')
            ->waitForText('Dialog Content 2')
            ->assertVisible('@content2')
            ->assertVisible('@content')
            ->pressEscape()
            ->waitForText('Dialog Content')
            ->assertVisible('@content')
            ->assertMissing('@content2')
            ->pressEscape()
            ->pause(100)
            ->assertMissing('@content2')
            ->assertMissing('@content');
    }

    public function test_triggering_dropdown_item_with_dismiss_doesnt_close_dialog_also()
    {
        $this->blade(<<<'HTML'
            <ui:dropdown>
                <x-slot:trigger>
                    <ui:button dusk="dropdown-trigger">Open Dropdown</ui:button>
                </x-slot:trigger>
                <ui:dialog dusk="dialog">
                    <x-slot:trigger>
                        <ui:dropdown-item dusk="dialog-trigger" :dismiss="true">Open Dialog</ui:dropdown-item>
                    </x-slot:trigger>
                    <span dusk="content">Dialog Content</span>
                </ui:dialog>
            </ui:dropdown>
        HTML)
            ->waitForText('Open Dropdown')
            ->click('@dropdown-trigger')
            ->waitForText('Open Dialog')
            ->click('@dialog-trigger')
            ->waitForText('Dialog Content')
            ->assertVisible('@content')
            ->assertMissing('@dialog-trigger');
    }
}

class ExampleLivewireDialog extends Component
{
    public $dialogOpenInLivewire = false;

    public function toggleDialog()
    {
        $this->dialogOpenInLivewire = ! $this->dialogOpenInLivewire;
    }

    public function render()
    {
        return <<<'HTML'
            <div>
                <ui:dialog dusk="dialog" wire:model="dialogOpenInLivewire">
                    <x-slot:trigger>
                        <ui:button dusk="trigger">Open Dialog</ui:button>
                    </x-slot:trigger>
                    Dialog Content
                </ui:dialog>
                <ui:button dusk="toggle" wire:click="toggleDialog">Toggle Dialog</ui:button>
            </div>
        HTML;
    }
}
