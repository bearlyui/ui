<?php

namespace Bearly\Ui;

enum Size: string
{
    use Comparable;

    case NONE = 'none';
    case XS = 'xs';
    case SM = 'sm';
    case BASE = 'base';
    case MD = 'md';
    case LG = 'lg';
    case XL = 'xl';
    case FULL = 'full';
}
