<?php

namespace Bearly\Ui\Tests;

use Illuminate\Support\Arr;
use Illuminate\Testing\TestView;
use Illuminate\Testing\TestResponse;
use PHPUnit\Framework\Assert as PHPUnit;
use Illuminate\Testing\Constraints\SeeInOrder;
use Illuminate\Support\ServiceProvider;

class HtmlTestingAssertionsProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        TestResponse::macro('assertSeeHtml', function ($values) {
            foreach (Arr::wrap($values) as $value) {
                PHPUnit::assertStringContainsString($value, $this->getContent());
            }

            return $this;
        });
        TestView::macro('assertSeeHtml', function ($values) {
            foreach (Arr::wrap($values) as $value) {
                PHPUnit::assertStringContainsString($value, $this->rendered);
            }

            return $this;
        });
        TestView::macro('assertSeeHtmlInOrder', function ($values) {
            PHPUnit::assertThat($values, new SeeInOrder($this->rendered));

            return $this;
        });
        TestResponse::macro('assertSeeHtmlInOrder', function ($values) {
            PHPUnit::assertThat($values, new SeeInOrder($this->getContent()));

            return $this;
        });

        TestResponse::macro('assertDontSeeHtml', function ($values) {
            foreach (Arr::wrap($values) as $value) {
                PHPUnit::assertStringNotContainsString($value, $this->getContent());
            }

            return $this;
        });
        TestView::macro('assertDontSeeHtml', function ($values) {
            foreach (Arr::wrap($values) as $value) {
                PHPUnit::assertStringNotContainsString($value, $this->rendered);
            }

            return $this;
        });
    }
}
