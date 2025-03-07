<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;
use Laravel\Dusk\Browser;

class MenuTest extends BrowserTestCase
{
    protected function menu($withBrowser = null)
    {
        return $this->blade(<<<'HTML'
            <ui:menu dusk="menu" mobileLabel="Navigation">
                <ui:menu-item href="/dashboard" icon="home" dusk="menu-item-1">
                    Dashboard
                </ui:menu-item>
                <ui:menu-item href="/team" icon="users" dusk="menu-item-2">
                    Team
                </ui:menu-item>
                <ui:menu-item href="/projects" icon="folder" dusk="menu-item-3">
                    Projects
                </ui:menu-item>
            </ui:menu>
        HTML, withBrowser: $withBrowser);
    }

    public function test_renders_desktop_and_mobile_versions()
    {
        $this->menu(withBrowser: function (Browser $browser) {
            $browser
                ->resize(375, 667)
                ->assertMissing('@menu-item-1')
                ->assertVisible('@menu [data-ui-mobile-menu]')
                ->resize(1920, 1080)
                ->assertVisible('@menu-item-1')
                ->assertMissing('@menu [data-ui-mobile-menu]');
        });
    }

    public function test_menu_item_with_icon()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="/dashboard" icon="home" dusk="menu-item-1">
                    Dashboard
                </ui:menu-item>
            </ui:menu>
        HTML)
            ->assertVisible('@menu-item-1 svg');
    }

    public function test_menu_item_without_icon()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="/dashboard" dusk="menu-item-1">
                    Dashboard
                </ui:menu-item>
            </ui:menu>
        HTML)
            ->assertMissing('@menu-item-1 svg');
    }

    // public function test_mobile_select_has_options_for_menu_items()
    // {
    //     $this->menu(3)
    //         ->waitFor('select option:not([disabled])')
    //         ->assertVisible('select option[value="/dashboard"]')
    //         ->assertVisible('select option[value="/team"]')
    //         ->assertVisible('select option[value="/projects"]')
    //         ->assertSeeIn('select option[value="/dashboard"]', 'Dashboard')
    //         ->assertSeeIn('select option[value="/team"]', 'Team')
    //         ->assertSeeIn('select option[value="/projects"]', 'Projects');
    // }

    // public function test_active_menu_item_has_aria_current()
    // {
    //     $this->menu(3)
    //         ->assertAttributeMissing('@menu-item-1', 'aria-current')
    //         ->assertAttribute('@menu-item-2', 'aria-current', 'page')
    //         ->assertAttribute('@menu-item-3', 'aria-current', 'page');
    // }

    // public function test_active_menu_item_is_selected_in_mobile_dropdown()
    // {
    //     $this->menu(3)
    //         ->waitFor('select option:not([disabled])')
    //         ->assertNotSelected('select', '/dashboard')
    //         ->assertSelected('select', '/team')
    //         ->assertSelected('select', '/projects');
    // }

    // public function test_menu_has_correct_aria_label()
    // {
    //     $this->menu()
    //         ->assertAttribute('nav', 'aria-label', 'Navigation');
    // }

    // TODO: add icon variant data attributes so we can test this easier
    // public function test_menu_item_with_custom_icon_variant()
    // {
    //     $this->blade(<<<'HTML'
    //         <ui:menu dusk="menu">
    //             <ui:menu-item href="/dashboard" icon="home" iconVariant="solid" dusk="menu-item-1">
    //                 Dashboard
    //             </ui:menu-item>
    //         </ui:menu>
    //     HTML)
    //         ->assertVisible('@menu-item-1 svg');
    // }

    // public function test_navigates_to_selected_page()
    // {
    //     $this->menu(3)
    //         ->waitFor('select option:not([disabled])')
    //         ->select('select', '/team')
    //         ->assertPathIs('/team');
    // }
}
