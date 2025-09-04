<?php

namespace Bearly\Ui;

enum Position: string
{
    use Comparable;

    case NONE = 'none';
    case TOP = 'top';
    case RIGHT = 'right';
    case BOTTOM = 'bottom';
    case LEFT = 'left';
    case CENTER = 'center';
}
