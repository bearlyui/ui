<?php

namespace Bearly\Ui;

enum Variant: string
{
    use Comparable;

    case Glow = 'glow';
    case Bordered = 'bordered';
    case Outline = 'outline';
    case Filled = 'filled';
}
