<?php

namespace Bearly\Ui;

enum AlertVariant: string
{
    case Glow = 'glow';
    case Bordered = 'bordered';

    public function is(string|self $variant): bool
    {
        if (is_string($variant)) {
            $variant = self::from($variant);
        }

        return $this->value === $variant->value;
    }
}
