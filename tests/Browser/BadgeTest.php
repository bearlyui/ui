<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class BadgeTest extends BrowserTestCase
{
    public function test_can_be_rendered()
    {
        $this->blade('<ui:badge dusk="badge">Hello!</ui:badge>')
            ->assertVisible('@badge')
            ->assertSee('Hello!');
    }

    public function test_colors()
    {
        $this->blade(<<<'HTML'
            <ui:badge color="primary" dusk="primary-badge">Primary</ui:badge>
            <ui:badge color="secondary" dusk="secondary-badge">Secondary</ui:badge>
            <ui:badge color="success" dusk="success-badge">Success</ui:badge>
            <ui:badge color="warning" dusk="warning-badge">Warning</ui:badge>
            <ui:badge color="danger" dusk="danger-badge">Danger</ui:badge>
        HTML)
            ->assertHasClass('@primary-badge', 'bg-primary-200/80')
            ->assertHasClass('@primary-badge', 'text-primary-900')
            ->assertHasClass('@secondary-badge', 'bg-secondary-300/80')
            ->assertHasClass('@secondary-badge', 'text-secondary-800')
            ->assertHasClass('@success-badge', 'bg-success-200/80')
            ->assertHasClass('@success-badge', 'text-success-900')
            ->assertHasClass('@warning-badge', 'bg-warning-200/80')
            ->assertHasClass('@warning-badge', 'text-warning-900')
            ->assertHasClass('@danger-badge', 'bg-danger-200/80')
            ->assertHasClass('@danger-badge', 'text-danger-900');
    }

    public function test_sizes()
    {
        $this->blade(<<<'HTML'
            <ui:badge size="sm" dusk="sm-badge">sm</ui:badge>
            <ui:badge size="base" dusk="base-badge">base</ui:badge>
            <ui:badge size="md" dusk="md-badge">md</ui:badge>
            <ui:badge size="lg" dusk="lg-badge">lg</ui:badge>
        HTML)
            ->assertHasClasses('@sm-badge', ['p-0.5', 'text-[0.675rem]'])
            ->assertHasClasses('@base-badge', ['px-1.5', 'py-1', 'text-xs'])
            ->assertHasClasses('@md-badge', ['px-2', 'py-1', 'text-sm'])
            ->assertHasClasses('@lg-badge', ['px-2', 'py-1', 'text-base']);
    }

    public function test_variants()
    {
        $this->blade(<<<'HTML'
            <ui:badge variant="solid" color="primary" dusk="solid-badge">Solid</ui:badge>
            <ui:badge variant="outline" color="primary" dusk="outline-badge">Outline</ui:badge>
        HTML)
            ->assertHasClass('@solid-badge', 'bg-primary-200/80')
            ->assertHasClass('@solid-badge', 'text-primary-900')
            ->assertHasClass('@outline-badge', 'bg-transparent')
            ->assertHasClass('@outline-badge', 'border-primary-200/80')
            ->assertHasClass('@outline-badge', 'text-primary-900');
    }
}
