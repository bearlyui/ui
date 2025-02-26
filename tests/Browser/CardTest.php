<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class CardTest extends BrowserTestCase
{
    public function test_can_be_rendered()
    {
        $this->blade('<ui:card dusk="card">Hello</ui:card>')
            ->assertVisible('@card')
            ->assertSee('Hello');
    }

    public function test_padding_sizes()
    {
        $this->blade('<ui:card padding="sm" dusk="card">Content</ui:card>')
            ->assertHasClass('@card', 'p-3');

        $this->blade('<ui:card padding="base" dusk="card">Content</ui:card>')
            ->assertHasClass('@card', 'p-4');

        $this->blade('<ui:card padding="md" dusk="card">Content</ui:card>')
            ->assertHasClass('@card', 'p-5');

        $this->blade('<ui:card padding="lg" dusk="card">Content</ui:card>')
            ->assertHasClass('@card', 'p-6');
    }

    public function test_header_slot()
    {
        $this->blade(<<<'HTML'
            <ui:card dusk="card">
                <x-slot:header dusk="header">Header Content</x-slot:header>
                Body Content
            </ui:card>
        HTML)
            ->assertVisible('@header')
            ->assertSee('Header Content')
            ->assertSee('Body Content')
            ->assertHasClass('@header', 'border-b');
    }

    public function test_footer_slot()
    {
        $this->blade(<<<'HTML'
            <ui:card dusk="card">
                Body Content
                <x-slot:footer dusk="footer">Footer Content</x-slot:footer>
            </ui:card>
        HTML)
            ->assertVisible('@footer')
            ->assertSee('Footer Content')
            ->assertSee('Body Content')
            ->assertHasClass('@footer', 'border-t');
    }

    public function test_header_padding_adjusts_with_card_padding()
    {
        $this->blade(<<<'HTML'
            <ui:card padding="lg" dusk="card">
                <x-slot:header dusk="header">Header</x-slot:header>
                Content
            </ui:card>
        HTML)
            ->assertHasClass('@header', '-mx-6')
            ->assertHasClass('@header', '-mt-6')
            ->assertHasClass('@header', 'mb-6')
            ->assertHasClass('@header', 'px-6')
            ->assertHasClass('@header', 'py-3.5');
    }

    public function test_footer_padding_adjusts_with_card_padding()
    {
        $this->blade(<<<'HTML'
            <ui:card padding="lg" dusk="card">
                Content
                <x-slot:footer dusk="footer">Footer</x-slot:footer>
            </ui:card>
        HTML)
            ->assertHasClass('@footer', '-mx-6')
            ->assertHasClass('@footer', '-mb-6')
            ->assertHasClass('@footer', 'mt-6')
            ->assertHasClass('@footer', 'px-6')
            ->assertHasClass('@footer', 'py-3.5');
    }

    public function test_nested_cards_have_different_background()
    {
        $this->blade(<<<'HTML'
            <ui:card dusk="outer">
                <ui:card dusk="inner">Inner Card</ui:card>
            </ui:card>
        HTML)
            ->assertHasClass('@outer', '*:data-ui-card:bg-gray-50/60')
            ->assertHasClass('@outer', 'dark:*:data-ui-card:bg-gray-700/30');
    }
}
