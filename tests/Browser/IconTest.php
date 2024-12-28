<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class IconTest extends BrowserTestCase
{
    public function test_can_be_rendered()
    {
        $this->blade('<ui:icon-arrow-right dusk="icon" />')
            ->assertVisible('@icon')
            ->assertSourceHas('svg')
            ->assertSourceHas('data-ui-icon-arrow-right');
    }

    public function test_variants_size_appropriately()
    {
        $this->blade('<ui:icon-arrow-right dusk="icon" variant="solid" />')
            ->assertVisible('@icon')
            ->assertAttribute('@icon', 'class', 'size-6')
            ->assertSourceHas('data-ui-icon-arrow-right');

        $this->blade('<ui:icon-arrow-right dusk="icon" variant="outline" />')
            ->assertVisible('@icon')
            ->assertAttribute('@icon', 'class', 'size-6')
            ->assertSourceHas('data-ui-icon-arrow-right');

        $this->blade('<ui:icon-arrow-right dusk="icon" variant="mini" />')
            ->assertVisible('@icon')
            ->assertAttribute('@icon', 'class', 'size-5')
            ->assertSourceHas('data-ui-icon-arrow-right');

        $this->blade('<ui:icon-arrow-right dusk="icon" variant="micro" />')
            ->assertVisible('@icon')
            ->assertAttribute('@icon', 'class', 'size-4')
            ->assertSourceHas('data-ui-icon-arrow-right');
    }

    public function test_attributes_forwarded()
    {
        $this->blade('<ui:icon-arrow-right dusk="icon" variant="solid" class="text-pink-500" x-test="test" />')
            ->assertVisible('@icon')
            ->assertAttribute('@icon', 'class', 'size-6 text-pink-500')
            ->assertAttribute('@icon', 'x-test', 'test');
    }
}
