<?php

namespace Bearly\Ui\Tests\Browser;

use Bearly\Ui\Tests\BrowserTestCase;
use Livewire\Component;
use Livewire\Livewire;

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
            ->pause(400)
            ->assertHasClass('@toggle', 'has-[input:checked]:bg-primary-500/80')
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
            'primary' => 'bg-primary-500/80',
            'secondary' => 'bg-secondary-500/80',
            'success' => 'bg-success-500/80',
            'warning' => 'bg-warning-500/80',
            'danger' => 'bg-danger-500/80',
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
        Livewire::visit(ExampleLivewireToggle::class)
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
        Livewire::visit(ExampleLivewireToggleArray::class)
            ->assertAttribute('@toggle-one', 'aria-checked', 'true')
            ->assertAttribute('@toggle-two', 'aria-checked', 'false')
            ->assertAttribute('@toggle-three', 'aria-checked', 'false')
            ->assertChecked('@toggle-one input[type=checkbox]')
            ->assertNotChecked('@toggle-two input[type=checkbox]')
            ->assertNotChecked('@toggle-three input[type=checkbox]')
            ->click('@toggle-one')
            ->pause(400)
            ->assertAttribute('@toggle-one', 'aria-checked', 'false')
            ->assertAttribute('@toggle-two', 'aria-checked', 'false')
            ->assertAttribute('@toggle-three', 'aria-checked', 'false')
            ->assertNotChecked('@toggle-one input[type=checkbox]')
            ->assertNotChecked('@toggle-two input[type=checkbox]')
            ->assertNotChecked('@toggle-three input[type=checkbox]')
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
    }

    public function test_on_and_off_icons_show_and_hide_correctly()
    {
        $this->blade(<<<'HTML'
                <ui:toggle dusk="toggle" />
            HTML)
            ->assertVisible('[data-ui-toggle-icon-off]')
            ->assertMissing('[data-ui-toggle-icon-on]')
            ->click('@toggle')
            ->pause(400)
            ->assertVisible('[data-ui-toggle-icon-on]')
            ->assertMissing('[data-ui-toggle-icon-off]');
    }

    public function test_outlined_in_red_when_livewire_errors()
    {

        Livewire::test(ExampleLivewireToggleWithSingleError::class)
            ->assertHasNoErrors()
            ->call('submit')
            ->assertHasErrors(['toggleState' => 'accepted'])
            ->assertSeeHtml('border-red-500/80');

        Livewire::visit(ExampleLivewireToggleWithSingleError::class)
            ->click('@submit')
            ->pause(400)
            ->assertHasClass('@toggle', 'border-red-500/80');
    }
}

class ExampleLivewireToggle extends Component
{
    public $toggleState = false;

    public function toggleStatus()
    {
        $this->toggleState = ! $this->toggleState;
    }

    public function render()
    {
        return <<<'HTML'
            <div>
                <label for="toggler">
                    <ui:toggle id="toggler" dusk="toggle" wire:model="toggleState" /> Label!
                </label>
                <div>
                    <ui:button dusk="toggle-status" wire:click="toggleStatus">Toggle Status</ui:button>
                    PHP STATE: {{ var_dump($toggleState) }}
                </div>
            </div>
        HTML;
    }
}

class ExampleLivewireToggleArray extends Component
{
    public $selection = ['one'];

    public function render()
    {
        return <<<'HTML'
            <div>
                <div class="flex flex-col gap-2 p-5">
                    @foreach (['one', 'two', 'three'] as $item)
                        <div class="flex items-center gap-2" wire:key="{{ $item }}">
                            <ui:toggle dusk="toggle-{{ $item }}" value="{{ $item }}" wire:model.live="selection" /> {{ $item }}
                        </div>
                    @endforeach
                </div>

                <ui:button dusk="set-1-3" wire:click="$set('selection', ['one', 'three'])">Set 1,3</ui:button>
                <ui:button dusk="set-2" wire:click="$set('selection', ['two'])">Set 2</ui:button>
            </div>
        HTML;
    }
}

class ExampleLivewireToggleWithSingleError extends Component
{
    public $toggleState = false;

    public function submit()
    {
        $this->validate(['toggleState' => 'accepted']);
    }

    public function render()
    {
        return <<<'HTML'
            <div>
            <form wire:submit="submit">
                    <ui:toggle dusk="toggle" value="thing" wire:model="toggleState" /> Thing
                    <ui:button dusk="submit" type="submit">Submit</ui:button>
                </form>
            </div>
        HTML;
    }
}
