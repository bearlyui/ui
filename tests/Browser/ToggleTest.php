<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class ToggleTest extends BrowserTestCase
{
    protected function toggle()
    {
        return $this->blade(<<<'HTML'
            <ui:toggle dusk="toggle" />
        HTML);
    }

    public function test_can_be_rendered()
    {
        $this->toggle()
            ->assertVisible('@toggle')
            ->assertAttribute('@toggle', 'role', 'switch')
            ->assertHasClass('@toggle', 'bg-gray-200');
    }

    public function test_can_be_toggled()
    {
        $this->toggle()
            ->click('@toggle')
            ->assertHasClass('@toggle', 'bg-primary-500')
            ->assertAttribute('@toggle', 'aria-checked', 'true')
            ->click('@toggle')
            ->assertHasClass('@toggle', 'bg-gray-200')
            ->assertAttribute('@toggle', 'aria-checked', 'false');
    }

    public function test_can_be_initialized_as_checked()
    {
        $this->blade(<<<'HTML'
            <ui:toggle :checked="true" dusk="toggle" />
        HTML)
            ->assertHasClass('@toggle', 'bg-primary-500')
            ->assertAttribute('@toggle', 'aria-checked', 'true');
    }

    public function test_supports_different_colors()
    {
        $colors = [
            'primary' => 'bg-primary-500',
            'secondary' => 'bg-secondary-500',
            'success' => 'bg-success-500',
            'warning' => 'bg-warning-500',
            'danger' => 'bg-danger-500',
        ];

        foreach ($colors as $color => $class) {
            $this->blade(<<<HTML
                <ui:toggle :checked="true" color="$color" dusk="toggle" />
            HTML)
                ->assertHasClass('@toggle', $class);
        }
    }

    public function test_can_hide_icons()
    {
        $this->blade(<<<'HTML'
            <ui:toggle :with-icon="false" dusk="toggle" />
        HTML)
            ->assertMissing('svg');
    }

    public function test_supports_custom_icons()
    {
        $this->blade(<<<'HTML'
            <ui:toggle dusk="toggle">
                <x-slot:icon-on>
                    <span dusk="custom-on">ON</span>
                </x-slot:icon-on>
                <x-slot:icon-off>
                    <span dusk="custom-off">OFF</span>
                </x-slot:icon-off>
            </ui:toggle>
        HTML)
            ->assertVisible('@custom-off')
            ->assertMissing('@custom-on')
            ->click('@toggle')
            ->waitFor('@custom-on')
            ->assertVisible('@custom-on')
            ->assertMissing('@custom-off');
    }

    // public function test_shows_error_state()
    // {
    //     $this->blade(<<<'HTML'
    //         <div>
    //             @php $errors = new \Illuminate\Support\MessageBag(['test' => 'Error']) @endphp
    //             <ui:toggle name="test" dusk="toggle" />
    //         </div>
    //     HTML)
    //         ->assertHasClass('@toggle', 'border-red-500');
    // }

    // TODO: FIX THIS
    // public function test_works_with_wire_model()
    // {
    //     $this->blade('<livewire:example-livewire-toggle />')
    //         ->assertHasClass('@toggle', 'bg-gray-200')
    //         ->click('@toggle-status')
    //         ->assertHasClass('@toggle', 'bg-primary-500');
    // }
}
