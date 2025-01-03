<?php

namespace Bearly\Ui\Tests\Browser;

use Facebook\WebDriver\WebDriverKeys;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\Browser;

class BrowserTestingProvider extends ServiceProvider
{
    public function boot()
    {
        Browser::macro('pressEscape', fn () => $this->withKeyboard(fn ($k) => $k->sendKeys(WebDriverKeys::ESCAPE)));
        Browser::macro('hoverWithJs', function ($selector) {
            $this->script("document.querySelector('{$selector}').dispatchEvent(new MouseEvent('mouseover', { bubbles: true }))");

            return $this;
        });
    }
}
