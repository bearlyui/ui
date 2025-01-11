<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class TableTest extends BrowserTestCase
{
    public function test_can_be_rendered()
    {
        $this->blade(<<<'HTML'
            <ui:table>
                <x-slot:header>
                    <ui:col>Col 1</ui:col>
                    <ui:col>Col 2</ui:col>
                </x-slot:header>

                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertSourceHas('<table')
            ->assertSourceHas('<thead')
            ->assertSourceHas('<tbody')
            ->assertSourceHas('<tr')
            ->assertSourceHas('<td')
            ->assertSourceHas('<th')
            ->assertSee('Col 1')
            ->assertSee('Col 2')
            ->assertSee('Cell 1')
            ->assertSee('Cell 2');
    }

    public function test_can_be_used_without_header()
    {
        $this->blade(<<<'HTML'
            <ui:table>
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertSourceMissing('<thead')
            ->assertSourceHas('<table')
            ->assertSourceHas('<tbody')
            ->assertSourceHas('<tr')
            ->assertSourceHas('<td');
    }

    public function test_hover_property()
    {
        $this->blade(<<<'HTML'
            <ui:table dusk="table">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertSourceMissing('[&_tbody>tr:hover_td]');

        $this->blade(<<<'HTML'
            <ui:table :hover="true" dusk="table">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertHasClass('@table', '[&_tbody>tr:hover_td]:bg-secondary-200/25');

    }

    public function test_hover_colors_can_be_customized()
    {
        $this->blade(<<<'HTML'
            <ui:table :hover="true" hover-color="primary" dusk="table-primary">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
            <ui:table :hover="true" hover-color="secondary" dusk="table-secondary">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
            <ui:table :hover="true" hover-color="success" dusk="table-success">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
            <ui:table :hover="true" hover-color="warning" dusk="table-warning">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
            <ui:table :hover="true" hover-color="danger" dusk="table-danger">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertHasClass('@table-primary', '[&_tbody>tr:hover_td]:bg-primary-200/10')
            ->assertHasClass('@table-secondary', '[&_tbody>tr:hover_td]:bg-secondary-200/25')
            ->assertHasClass('@table-success', '[&_tbody>tr:hover_td]:bg-success-200/10')
            ->assertHasClass('@table-warning', '[&_tbody>tr:hover_td]:bg-warning-200/10')
            ->assertHasClass('@table-danger', '[&_tbody>tr:hover_td]:bg-danger-200/10');
    }

    public function test_striped_property()
    {
        $this->blade(<<<'HTML'
            <ui:table :striped="true" dusk="table">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertSourceMissing('[&_tbody>tr:nth-child(even)_td]');

        $this->blade(<<<'HTML'
            <ui:table :striped="true" dusk="table">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertHasClass('@table', '[&_tbody>tr:nth-child(even)_td]:bg-gray-100/50');
    }

    public function test_empty_state()
    {
        $this->blade(<<<'HTML'
            <ui:table :empty="false" empty-message="Example empty state" dusk="table">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertVisible('@table')
            ->assertDontSee('Example empty state');

        $this->blade(<<<'HTML'
            <ui:table :empty="true" empty-message="Example empty state" dusk="table">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertMissing('@table')
            ->assertSee('Example empty state');
    }

    public function test_inset_within_card()
    {
        $this->blade(<<<'HTML'
            <ui:card padding="sm" dusk="card">
                <ui:table :inset="true">
                    <ui:row>
                        <ui:cell>Cell 1</ui:cell>
                        <ui:cell>Cell 2</ui:cell>
                    </ui:row>
                </ui:table>
            </ui:card>
        HTML)
            ->assertHasClasses('@card', [
                '[&_[data-ui-table-inset]]:-m-3',
                '[&_[data-ui-table-inset]]:ring-transparent',
            ]);

        $this->blade(<<<'HTML'
            <ui:card padding="base" dusk="card">
                <ui:table :inset="true">
                    <ui:row>
                        <ui:cell>Cell 1</ui:cell>
                        <ui:cell>Cell 2</ui:cell>
                    </ui:row>
                </ui:table>
            </ui:card>
        HTML)
            ->assertHasClasses('@card', [
                '[&_[data-ui-table-inset]]:-m-4',
                '[&_[data-ui-table-inset]]:ring-transparent',
            ]);

        $this->blade(<<<'HTML'
            <ui:card padding="md" dusk="card">
                <ui:table :inset="true">
                    <ui:row>
                        <ui:cell>Cell 1</ui:cell>
                        <ui:cell>Cell 2</ui:cell>
                    </ui:row>
                </ui:table>
            </ui:card>
        HTML)
            ->assertHasClasses('@card', [
                '[&_[data-ui-table-inset]]:-m-5',
                '[&_[data-ui-table-inset]]:ring-transparent',
            ]);

        $this->blade(<<<'HTML'
            <ui:card padding="lg" dusk="card">
                <ui:table :inset="true">
                    <ui:row>
                        <ui:cell>Cell 1</ui:cell>
                        <ui:cell>Cell 2</ui:cell>
                    </ui:row>
                </ui:table>
            </ui:card>
        HTML)
            ->assertHasClasses('@card', [
                '[&_[data-ui-table-inset]]:-m-6',
                '[&_[data-ui-table-inset]]:ring-transparent',
            ]);
    }

    public function test_sticky_header()
    {
        $this->blade(<<<'HTML'
            <ui:table dusk="table">
                <x-slot:header :sticky="false">
                    <ui:col>Col 1</ui:col>
                    <ui:col>Col 2</ui:col>
                </x-slot:header>
            </ui:table>
        HTML)
            ->assertSourceMissing('[&>th]:sticky');

        $this->blade(<<<'HTML'
            <ui:table dusk="table">
                <x-slot:header :sticky="true">
                    <ui:col>Col 1</ui:col>
                    <ui:col>Col 2</ui:col>
                </x-slot:header>

                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertHasClasses('@table thead>tr', [
                '[&>th]:sticky',
                '[&>th]:top-0',
                '[&>th]:backdrop-blur-lg',
            ]);
    }

    public function test_hover_cell_hidden_until_hover()
    {
        $this->blade(<<<'HTML'
            <ui:table :hover="true" dusk="table">
                <ui:row>
                    <ui:cell dusk="cell-1">Cell 1</ui:cell>
                    <ui:cell :hover="true"><span dusk="cell-2-content">Cell 2</span></ui:cell>
                </ui:row>
            </ui:table>
            <ui:button dusk="button">Outside Button</ui:button>
        HTML)
            ->assertVisible('@cell-1')
            ->assertMissing('@cell-2-content')
            ->clickAndHold('@cell-1')
            ->waitFor('@cell-2-content')
            ->assertVisible('@cell-1')
            ->assertVisible('@cell-2-content')
            ->releaseMouse()
            ->click('@button')
            ->waitUntilMissing('@cell-2-content')
            ->assertVisible('@cell-1');
    }
}
