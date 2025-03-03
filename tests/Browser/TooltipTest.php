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
            ->clickAndHold('@btn')
            ->pause(500)
            ->assertSee('Happy little tooltip')
            ->releaseMouse();
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
            ->clickAndHold('@btn')
            ->pause(500)
            ->assertSee('Tooltip with trigger slot')
            ->releaseMouse();
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
            ->clickAndHold('@btn')
            ->pause(500)
            ->assertSee('Title prop tooltip')
            ->releaseMouse();
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
            ->clickAndHold('@btn')
            ->pause(500)
            ->assertSee('Save changes')
            ->assertSee('⌘+S')
            ->releaseMouse();
    }

    public function test_sm_size()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn">
                <ui:tooltip dusk="tooltip" size="sm">Small tooltip</ui:tooltip>
                Small
            </ui:button>
        HTML)
            ->clickAndHold('@btn')
            ->pause(500)
            ->assertSourceHas('px-1.5 py-1 text-xs')
            ->releaseMouse();
    }

    public function test_md_size()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn-md">
                <ui:tooltip dusk="tooltip-md" size="md">Medium tooltip</ui:tooltip>
                Medium
            </ui:button>
        HTML)
            ->clickAndHold('@btn-md')
            ->pause(500)
            ->assertSourceHas('px-3 py-1.5 text-sm')
            ->releaseMouse();
    }

    public function test_lg_size()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn-lg">
                <ui:tooltip dusk="tooltip-lg" size="lg">Large tooltip</ui:tooltip>
                Large
            </ui:button>
        HTML)
            ->clickAndHold('@btn-lg')
            ->pause(500)
            ->assertSourceHas('px-4 py-2 text-base')
            ->releaseMouse();
    }

    public function test_xl_size()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn-xl">
                <ui:tooltip dusk="tooltip-xl" size="xl">Extra large tooltip</ui:tooltip>
                Extra Large
            </ui:button>
        HTML)
            ->clickAndHold('@btn-xl')
            ->pause(500)
            ->assertSourceHas('px-5 py-2.5 text-lg')
            ->releaseMouse();
    }

    public function test_positions()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn">
                <ui:tooltip dusk="tooltip" position="bottom">Bottom tooltip</ui:tooltip>
                Bottom
            </ui:button>
        HTML)
            ->clickAndHold('@btn')
            ->pause(500)
            ->assertPresent('[x-anchor\\.bottom\\.offset\\.4]')
            ->releaseMouse();
    }

    public function test_tooltip_with_custom_offset()
    {
        $this->blade(<<<'HTML'
            <ui:button dusk="btn">
                <ui:tooltip dusk="tooltip" offset="20">Custom offset tooltip</ui:tooltip>
                Offset
            </ui:button>
        HTML)
            ->clickAndHold('@btn')
            ->pause(500)
            ->assertPresent('[x-anchor\\.top\\.offset\\.20]')
            ->releaseMouse();
    }
}
