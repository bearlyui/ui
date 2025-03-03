<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class TileTest extends BrowserTestCase
{
    public function test_can_be_rendered()
    {
        $this->blade(<<<'HTML'
            <ui:tiles dusk="tiles">
                <ui:tile dusk="tile">
                    <x-slot:label>Test Label</x-slot:label>
                    <x-slot:description>Test Description</x-slot:description>
                    Test Content
                </ui:tile>
            </ui:tiles>
        HTML)
            ->assertVisible('@tiles')
            ->assertVisible('@tile')
            ->assertSee('Test Label')
            ->assertSee('Test Description')
            ->assertSee('Test Content');
    }

    public function test_variants()
    {
        $this->blade('<ui:tiles variant="solid" dusk="tiles"><ui:tile dusk="tile">Content</ui:tile></ui:tiles>')
            ->assertVisible('@tiles')
            ->assertHasClass('@tiles', 'bg-gray-900/5')
            ->assertHasClass('@tile', 'bg-white');

        $this->blade('<ui:tiles variant="outline" dusk="tiles"><ui:tile dusk="tile">Content</ui:tile></ui:tiles>')
            ->assertVisible('@tiles')
            ->assertHasClass('@tiles', 'bg-transparent')
            ->assertHasClass('@tile', 'ring-1');

        $this->blade('<ui:tiles variant="ghost" dusk="tiles"><ui:tile dusk="tile">Content</ui:tile></ui:tiles>')
            ->assertVisible('@tiles')
            ->assertHasClass('@tiles', 'bg-transparent')
            ->assertHasClass('@tile', 'bg-transparent');
    }

    public function test_supports_different_gap_sizes()
    {
        $this->blade('<ui:tiles gap="sm" dusk="tiles">Content</ui:tiles>')
            ->assertVisible('@tiles')
            ->assertHasClass('@tiles', 'gap-px');

        $this->blade('<ui:tiles gap="md" dusk="tiles">Content</ui:tiles>')
            ->assertVisible('@tiles')
            ->assertHasClass('@tiles', 'gap-0.5');

        $this->blade('<ui:tiles gap="lg" dusk="tiles">Content</ui:tiles>')
            ->assertVisible('@tiles')
            ->assertHasClass('@tiles', 'gap-1');
    }

    public function test_tile_slots_are_optional()
    {
        $this->blade('<ui:tile dusk="tile">Content Only</ui:tile>')
            ->assertVisible('@tile')
            ->assertSee('Content Only');

        $this->blade(<<<'HTML'
            <ui:tile dusk="tile">
                <x-slot:label>Just Label</x-slot:label>
                Content
            </ui:tile>
        HTML)
            ->assertVisible('@tile')
            ->assertSee('Just Label')
            ->assertSee('Content');

        $this->blade(<<<'HTML'
            <ui:tile dusk="tile">
                <x-slot:description>Just Description</x-slot:description>
                Content
            </ui:tile>
        HTML)
            ->assertVisible('@tile')
            ->assertSee('Just Description')
            ->assertSee('Content');

        $this->blade(<<<'HTML'
            <ui:tile dusk="tile">
                <x-slot:label>Test Label</x-slot:label>
                <x-slot:description>Test Description</x-slot:description>
                Test Content
            </ui:tile>
        HTML)
            ->assertVisible('@tile')
            ->assertSee('Test Label')
            ->assertSee('Test Description')
            ->assertSee('Test Content');
    }
}
