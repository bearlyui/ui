<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;
use Facebook\WebDriver\WebDriverKeys;

class DialogTest extends BrowserTestCase
{
    protected function dialog()
    {
        return $this->blade(<<<'HTML'
            <ui:dialog dusk="dialog">
                <x-slot:trigger>
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
            ->withKeyboard(fn ($k) => $k->sendKeys(WebDriverKeys::ESCAPE))
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
            ->pause(1000)
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
}
