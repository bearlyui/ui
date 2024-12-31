<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;

class ToggleTest extends BrowserTestCase
{
    protected function toggle()
    {
        return $this->blade(<<<'HTML'
            <ui:toggle dusk="toggle" color="primary" />
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
            ->assertHasClass('@toggle', 'has-[input:checked]:bg-primary-500')
            ->assertAttribute('@toggle', 'aria-checked', 'true')
            ->assertAttribute('@toggle input[type=checkbox]', 'checked', 'true')
            ->click('@toggle')
            ->pause(400)
            ->assertAttribute('@toggle', 'aria-checked', 'false')
            ->assertAttributeMissing('@toggle input[type=checkbox]', 'checked');
    }

    public function test_can_be_initialized_as_checked()
    {
        $this->blade(<<<'HTML'
            <ui:toggle :checked="true" dusk="toggle" />
        HTML)
            ->assertAttribute('@toggle input[type=checkbox]', 'checked', 'true')
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
                ->assertHasClass('@toggle', 'has-[input:checked]:'.$class);
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
            ->waitUntilMissing('@custom-off')
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

    public function test_submits_like_normal_input_in_form()
    {
        $this->blade(<<<'HTML'
            <form action="/_test_ui/post-dumper" method="post">
                <ui:toggle name="toggle" dusk="toggle" />
                <button type="submit" dusk="submit">Submit</button>
            </form>
        HTML)
            ->click('@toggle')
            ->pause(400)
            ->assertChecked('@toggle input[type=checkbox]')
            ->press('@submit')
            ->pause(400)
            ->assertSee('"toggle":"on"');
    }

    public function test_no_data_submitted_when_not_checked()
    {
        $this->blade(<<<'HTML'
            <form action="/_test_ui/post-dumper" method="post">
                <ui:toggle name="toggle" dusk="toggle" />
                <button type="submit" dusk="submit">Submit</button>
            </form>
        HTML)
            ->press('@submit')
            ->pause(400)
            ->assertDontSee('"toggle"');
    }

    public function test_works_with_wire_model()
    {
        $this->blade('<livewire:example-livewire-toggle />')
            ->assertAttribute('@toggle', 'aria-checked', 'false')
            ->assertNotChecked('@toggle input[type=checkbox]')
            ->click('@toggle-status')
            ->pause(400)
            ->assertAttribute('@toggle', 'aria-checked', 'true')
            ->assertChecked('@toggle input[type=checkbox]')
            ->click('@toggle-status')
            ->pause(400)
            ->assertAttribute('@toggle', 'aria-checked', 'false')
            ->assertNotChecked('@toggle input[type=checkbox]');
    }

    public function test_works_with_wire_model_as_array()
    {
        $this->blade('<livewire:example-livewire-toggle-array />')
            ->assertAttribute('@toggle-one', 'aria-checked', 'true')
            ->assertAttribute('@toggle-two', 'aria-checked', 'false')
            ->assertAttribute('@toggle-three', 'aria-checked', 'false')
            ->assertChecked('@toggle-one input[type=checkbox]')
            ->assertNotChecked('@toggle-two input[type=checkbox]')
            ->assertNotChecked('@toggle-three input[type=checkbox]')
            ->click('@toggle-one')
            ->pause(400)
            ->assertAttribute('@toggle-one', 'aria-checked', '')
            ->assertAttribute('@toggle-two', 'aria-checked', '')
            ->assertAttribute('@toggle-three', 'aria-checked', '')
            ->assertNotChecked('@toggle-one input[type=checkbox]')
            ->assertNotChecked('@toggle-two input[type=checkbox]')
            ->assertNotChecked('@toggle-three input[type=checkbox]')
            ->tinker()
            ->click('@set-1-3')
            ->pause(400)
            ->assertAttribute('@toggle-one', 'aria-checked', 'true')
            ->assertAttribute('@toggle-two', 'aria-checked', 'false')
            ->assertAttribute('@toggle-three', 'aria-checked', 'true')
            ->assertChecked('@toggle-one input[type=checkbox]')
            ->assertNotChecked('@toggle-two input[type=checkbox]')
            ->assertChecked('@toggle-three input[type=checkbox]')
            ->click('@set-2')
            ->pause(400)
            ->assertAttribute('@toggle-one', 'aria-checked', 'false')
            ->assertAttribute('@toggle-two', 'aria-checked', 'true')
            ->assertAttribute('@toggle-three', 'aria-checked', 'false')
            ->assertNotChecked('@toggle-one input[type=checkbox]')
            ->assertChecked('@toggle-two input[type=checkbox]')
            ->assertNotChecked('@toggle-three input[type=checkbox]')
            ->click('@toggle-three')
            ->pause(400)
            ->assertAttribute('@toggle-one', 'aria-checked', 'false')
            ->assertAttribute('@toggle-two', 'aria-checked', 'true')
            ->assertAttribute('@toggle-three', 'aria-checked', 'true')
            ->assertNotChecked('@toggle-one input[type=checkbox]')
            ->assertChecked('@toggle-two input[type=checkbox]')
            ->assertChecked('@toggle-three input[type=checkbox]');

        // Assert multiple toggles via an array does the errors as you'd expect

        // Things to test with form binding stuff:
        // - [x] Works as normal form input with a POST request
        // - [x] Works when bound to wire:model as a single variable
        // - [x] No data submitted when not checked
        // - [ ] Works when bound to wire:model as an array
        // - [ ] Errors show in all three of the above cases
        // - [ ] Old input values work in all three of the above cases?
        // - [ ] Test wire:model sets it properly on
    }
}
