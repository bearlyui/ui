<?php

namespace Bearly\Ui;

enum AlertTheme: string
{
    case Primary = 'primary';
    case Success = 'success';
    case Warning = 'warning';
    case Error = 'error';

    public function is(string|AlertTheme $theme): bool
    {
        if (is_string($theme)) {
            $theme = self::from($theme);
        }

        return $this->value === $theme->value;
    }
}
