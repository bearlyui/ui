<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class TypographyTest extends BrowserTestCase
{
    public function test_render_heading()
    {
        $this->blade('<ui:heading>Example Heading</ui:heading>')
            ->assertVisible('h2[data-ui-heading]')
            ->assertSee('Example Heading');
    }

    public function test_heading_tag_can_be_changed()
    {
        $this->blade('<ui:heading tag="h1">Example Heading</ui:heading>')
            ->assertVisible('h1')
            ->assertSee('Example Heading');
    }

    public function test_heading_sizes()
    {
        $this->blade('<ui:heading size="base">Example Heading</ui:heading>')
            ->assertVisible('h2')
            ->assertSourceHas('text-base font-medium')
            ->assertSee('Example Heading');

        $this->blade('<ui:heading size="md">Example Heading</ui:heading>')
            ->assertVisible('h2')
            ->assertSourceHas('text-lg font-medium')
            ->assertSee('Example Heading');

        $this->blade('<ui:heading size="lg">Example Heading</ui:heading>')
            ->assertVisible('h2')
            ->assertSourceHas('text-xl tracking-tight font-semibold')
            ->assertSee('Example Heading');

        $this->blade('<ui:heading size="xl">Example Heading</ui:heading>')
            ->assertVisible('h2')
            ->assertSourceHas('text-2xl tracking-tight font-bold')
            ->assertSee('Example Heading');
    }

    public function test_render_subheading()
    {
        $this->blade('<ui:subheading>Example Subheading</ui:subheading>')
            ->assertVisible('p[data-ui-subheading]')
            ->assertSee('Example Subheading');
    }

    public function test_subheading_tag_can_be_changed()
    {
        $this->blade('<ui:subheading tag="h3">Example Subheading</ui:subheading>')
            ->assertVisible('h3[data-ui-subheading]')
            ->assertSee('Example Subheading');
    }

    public function test_subheading_sizes()
    {
        $this->blade('<ui:subheading size="base">Example Subheading</ui:subheading>')
            ->assertVisible('p')
            ->assertSourceHas('text-sm')
            ->assertSee('Example Subheading');

        $this->blade('<ui:subheading size="md">Example Subheading</ui:subheading>')
            ->assertVisible('p')
            ->assertSourceHas('text-base')
            ->assertSee('Example Subheading');

        $this->blade('<ui:subheading size="lg">Example Subheading</ui:subheading>')
            ->assertVisible('p')
            ->assertSourceHas('text-base font-light')
            ->assertSee('Example Subheading');

        $this->blade('<ui:subheading size="xl">Example Subheading</ui:subheading>')
            ->assertVisible('p')
            ->assertSourceHas('text-lg font-light')
            ->assertSee('Example Subheading');
    }

    public function test_link_renders()
    {
        $this->blade('<ui:link>Example Link</ui:link>')
            ->assertVisible('a')
            ->assertMissing('a[href]')
            ->assertSee('Example Link');
    }

    public function test_link_with_href()
    {
        $this->blade('<ui:link href="https://example.com">Example Link</ui:link>')
            ->assertVisible('a')
            ->assertAttribute('a', 'href', 'https://example.com/')
            ->assertSee('Example Link');
    }

    public function test_link_with_when_clause()
    {
        $this->blade('<ui:link dusk="link" :when="true" href="https://test.test/">Example Link</ui:link>')
            ->assertAttribute('@link', 'href', 'https://test.test/')
            ->assertVisible('a[href]')
            ->assertSee('Example Link');

        $this->blade('<ui:link dusk="link" :when="false" href="https://test.test/">Example Link</ui:link>')
            ->assertMissing('a[href]')
            ->assertSee('Example Link');
    }
}
