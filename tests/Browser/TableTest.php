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
            <ui:table :hover="true" dusk="table">
                <ui:row>
                    <ui:cell>Cell 1</ui:cell>
                    <ui:cell>Cell 2</ui:cell>
                </ui:row>
            </ui:table>
        HTML)
            ->assertHasClass('@table', '[&_tbody>tr:hover_td]:bg-secondary-200/25');

    }
}
