<?php

namespace Bearly\Ui;

trait Comparable
{
    public function is(string|self $variant): bool
    {
        if (is_string($variant)) {
            $variant = self::from($variant);
        }

        return $this->value === $variant->value;
    }
}
