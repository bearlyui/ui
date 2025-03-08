<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class MenuTest extends BrowserTestCase
{
    protected function tearDown(): void
    {
        $this->menu()->resize(1920, 1080);
        parent::tearDown();
    }

    protected function menu()
    {
        return $this->blade(<<<'HTML'
            <ui:menu dusk="menu" mobile-label="Mobile Label">
                <ui:menu-item href="#dashboard" icon="home" dusk="menu-item-1">
                    Dashboard
                </ui:menu-item>
                <ui:menu-item href="#team" icon="users" dusk="menu-item-2">
                    Team
                </ui:menu-item>
                <ui:menu-item href="#projects" icon="folder" dusk="menu-item-3">
                    Projects
                </ui:menu-item>
            </ui:menu>
        HTML);
    }

    public function test_renders_desktop_and_mobile_versions()
    {
        $this->menu()
            ->resize(375, 667)
            ->assertMissing('@menu-item-1')
            ->assertVisible('@menu [data-ui-mobile-menu]')
            ->resize(1920, 1080)
            ->assertVisible('@menu-item-1')
            ->assertMissing('@menu [data-ui-mobile-menu]');
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
            ->waitFor('@menu-item-1')
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
            ->waitFor('@menu-item-1')
            ->assertMissing('@menu-item-1 svg');
    }

    public function test_mobile_label_defaults_to_navigation()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="/dashboard" dusk="menu-item-1">
                    Dashboard
                </ui:menu-item>
            </ui:menu>
        HTML)
            ->resize(375, 667)
            ->assertVisible('@menu [data-ui-mobile-menu] option[disabled]')
            ->assertSeeIn('@menu [data-ui-mobile-menu] option[disabled]', 'Navigation');
    }

    public function test_mobile_select_uses_mobile_label_prop_as_disabled_option()
    {
        $this->menu()
            ->resize(375, 667)
            ->waitFor('@menu [data-ui-mobile-menu] option[disabled]')
            ->assertSeeIn('@menu [data-ui-mobile-menu] option[disabled]', 'Mobile Label');
    }

    public function test_mobile_select_has_options_for_menu_items()
    {
        $this->menu()
            ->resize(375, 667)
            ->waitFor('select option:not([disabled])')
            ->assertVisible('select option[value="#dashboard"]')
            ->assertVisible('select option[value="#team"]')
            ->assertVisible('select option[value="#projects"]')
            ->assertSeeIn('select option[value="#dashboard"]', 'Dashboard')
            ->assertSeeIn('select option[value="#team"]', 'Team')
            ->assertSeeIn('select option[value="#projects"]', 'Projects');
    }

    public function test_active_menu_item_has_aria_current()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" dusk="menu-item-1" :active="false">Dashboard</ui:menu-item>
                <ui:menu-item href="#" dusk="menu-item-2" :active="true">Team</ui:menu-item>
                <ui:menu-item href="#" dusk="menu-item-3">Projects</ui:menu-item>
            </ui:menu>
        HTML)
            ->assertAttribute('@menu-item-2', 'aria-current', 'page')
            ->assertAttributeMissing('@menu-item-1', 'aria-current')
            ->assertAttributeMissing('@menu-item-3', 'aria-current');
    }

    public function test_active_menu_item_is_selected_in_mobile_dropdown()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" dusk="menu-item-1" :active="false">Dashboard</ui:menu-item>
                <ui:menu-item href="#" dusk="menu-item-2" :active="true">Team</ui:menu-item>
                <ui:menu-item href="#" dusk="menu-item-3">Projects</ui:menu-item>
            </ui:menu>
        HTML)
            ->resize(375, 667)
            ->assertVisible('@menu [data-ui-mobile-menu] option[selected]')
            ->assertSeeIn('@menu [data-ui-mobile-menu] option[selected]', 'Team');
    }

    public function test_menu_has_correct_aria_label()
    {
        $this->menu()
            ->assertAttribute('nav', 'aria-label', 'Mobile Label');
    }

    public function test_selecting_mobile_menu_item_navigates_to_corresponding_page()
    {
        $this->menu()
            ->resize(375, 667)
            ->waitFor('@menu [data-ui-mobile-menu]')
            ->select('@menu [data-ui-mobile-menu]', '#team')
            ->assertFragmentIs('team')
            ->select('@menu [data-ui-mobile-menu]', '#dashboard')
            ->assertFragmentIs('dashboard');
    }

    public function test_menu_item_with_badge_prop_renders_badge()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" badge="10" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->waitFor('@menu-item-1')
            ->assertVisible('@menu-item-1 [data-ui-badge]')
            ->assertSeeIn('@menu-item-1 [data-ui-badge]', 10);
    }

    public function test_menu_item_with_badge_doesnt_show_zero_by_default()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" :badge="0" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->waitFor('@menu-item-1')
            ->assertMissing('@menu-item-1 [data-ui-badge]');
    }

    public function test_menu_item_with_badge_shows_zero_if_show_zero_prop_is_true()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" :badge="0" :show-zero="true" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->waitFor('@menu-item-1')
            ->assertVisible('@menu-item-1 [data-ui-badge]')
            ->assertSeeIn('@menu-item-1 [data-ui-badge]', 0);
    }

    public function test_badge_defaults_to_secondary_color()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" :badge="10" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->waitFor('@menu-item-1')
            ->assertVisible('@menu-item-1 [data-ui-badge]')
            ->assertHasClass('@menu-item-1 [data-ui-badge]', 'text-secondary-800');
    }

    public function test_badge_color_prop_changes_badge_color()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" :badge="10" badge-color="primary" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->waitFor('@menu-item-1')
            ->assertVisible('@menu-item-1 [data-ui-badge]')
            ->assertHasClass('@menu-item-1 [data-ui-badge]', 'text-primary-900');
    }

    public function test_badge_variant_prop_changes_badge_variant()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" :badge="10" badge-color="primary" badge-variant="solid" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->waitFor('@menu-item-1')
            ->assertVisible('@menu-item-1 [data-ui-badge]')
            ->assertHasClass('@menu-item-1 [data-ui-badge]', 'bg-primary-200/60');

        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" :badge="10" badge-color="primary" badge-variant="outline" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->waitFor('@menu-item-1')
            ->assertVisible('@menu-item-1 [data-ui-badge]')
            ->assertHasClass('@menu-item-1 [data-ui-badge]', 'border-primary-600/70');
    }

    public function test_badge_size_prop_changes_badge_size()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" :badge="10" badge-size="xs" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->waitFor('@menu-item-1')
            ->assertVisible('@menu-item-1 [data-ui-badge]')
            ->assertHasClass('@menu-item-1 [data-ui-badge]', 'text-[0.675rem]');
    }

    // TODO: add icon variant data attributes so we can test this easier
    // public function test_menu_item_with_custom_icon_variant()
    // {
    //     $this->blade(<<<'HTML'
    //         <ui:menu dusk="menu">
    //             <ui:menu-item href="#dashboard" icon="home" iconVariant="solid" dusk="menu-item-1">
    //                 Dashboard
    //             </ui:menu-item>
    //         </ui:menu>
    //     HTML)
    //         ->assertVisible('@menu-item-1 svg');
    // }

    public function test_menu_with_size_prop_adds_max_width_class()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu" size="xs">
                <ui:menu-item href="#" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->assertHasClass('@menu', 'max-w-40');
    }

    public function test_menu_defaults_to_sm_size()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu">
                <ui:menu-item href="#" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->assertHasClass('@menu', 'max-w-54');
    }

    public function test_menu_with_size_full_adds_no_max_width_class()
    {
        $this->blade(<<<'HTML'
            <ui:menu dusk="menu" size="full">
                <ui:menu-item href="#" dusk="menu-item-1">Dashboard</ui:menu-item>
            </ui:menu>
        HTML)
            ->assertClassMissing('@menu', 'max-w-54');
    }
}
