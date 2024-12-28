<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

/**
 * ALL OF THESE TESTS ARE FLAKY when ran together.
 * It seems like any amount of pausing doesn't fix it.
 * It's like the mouseover isn't working consistently.
 */
class TooltipTest extends BrowserTestCase
{
    public function test_tooltip_with_parent_tag()
    {
        $this->blade(<<<'HTML'
            <ui:tooltip dusk="tooltip" title="Happy little tooltip">
                <x-slot:trigger>
                    <ui:button dusk="btn">
                        Button With Tooltip
                    </ui:button>
                </x-slot:trigger>
            </ui:tooltip>
        HTML)
            ->assertMissing('Happy little tooltip')
            ->mouseover('@btn')
            ->waitFor('@tooltip')
            ->assertSee('Happy little tooltip');
    }

    public function test_tooltip_with_trigger_slot()
    {
        $this->blade(<<<'HTML'
            <ui:tooltip dusk="tooltip">
                <x-slot:trigger>
                    <ui:button dusk="btn">Hover Me</ui:button>
                </x-slot:trigger>
                Tooltip with trigger slot
            </ui:tooltip>
        HTML)
            ->assertMissing('Tooltip with trigger slot')
            ->mouseover('@btn')
            ->waitFor('@tooltip')
            ->assertSee('Tooltip with trigger slot');
    }

    public function test_tooltip_with_title_prop()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn">
                <ui:tooltip dusk="tooltip" title="Title prop tooltip" />
                Hover for title
            </ui:button>
        HTML)
            ->assertMissing('Title prop tooltip')
            ->mouseover('@btn')
            ->waitFor('@tooltip')
            ->assertSee('Title prop tooltip');
    }

    public function test_tooltip_with_shortcut()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn">
                <ui:tooltip dusk="tooltip" shortcut="⌘+S">Save changes</ui:tooltip>
                Save
            </ui:button>
        HTML)
            ->assertMissing('Save changes')
            ->assertMissing('⌘+S')
            ->mouseover('@btn')
            ->waitFor('@tooltip')
            ->assertSee('Save changes')
            ->assertSee('⌘+S');
    }

    public function test_sm_size()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn">
                <ui:tooltip dusk="tooltip" size="sm">Small tooltip</ui:tooltip>
                Small
            </ui:button>
        HTML)
            ->mouseover('@btn')
            ->waitFor('@tooltip')
            ->assertSourceHas('px-1.5 py-1 text-xs');
    }

    public function test_base_size()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn-base">
                <ui:tooltip dusk="tooltip-base" size="base">Base tooltip</ui:tooltip>
                Base
            </ui:button>
        HTML)
            ->mouseover('@btn-base')
            ->waitFor('@tooltip-base')
            ->assertSourceHas('px-3 py-1.5 text-sm');
    }

    public function test_md_size()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn-md">
                <ui:tooltip dusk="tooltip-md" size="md">Medium tooltip</ui:tooltip>
                Medium
            </ui:button>
        HTML)
            ->mouseover('@btn-md')
            ->waitFor('@tooltip-md')
            ->assertSourceHas('px-4 py-2 text-base');
    }

    public function test_lg_size()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn-lg">
                <ui:tooltip dusk="tooltip-lg" size="lg">Large tooltip</ui:tooltip>
                Large
            </ui:button>
        HTML)
            ->mouseover('@btn-lg')
            ->waitFor('@tooltip-lg')
            ->assertSourceHas('px-5 py-2.5 text-lg');
    }

    public function test_positions()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn">
                <ui:tooltip dusk="tooltip" position="bottom">Bottom tooltip</ui:tooltip>
                Bottom
            </ui:button>
        HTML)
            ->mouseover('@btn')
            ->waitFor('@tooltip')
            ->assertPresent('[x-anchor\\.bottom\\.offset\\.4]');
    }

    public function test_tooltip_with_custom_offset()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn">
                <ui:tooltip dusk="tooltip" offset="20">Custom offset tooltip</ui:tooltip>
                Offset
            </ui:button>
        HTML)
            ->mouseover('@btn')
            ->waitFor('@tooltip')
            ->assertPresent('[x-anchor\\.top\\.offset\\.20]');
    }
}
