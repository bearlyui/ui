<?php

namespace Bearly\Ui;

enum Variant: string
{
    use Comparable;

    case Bordered = 'bordered';
    case Ghost = 'ghost';
    case Glow = 'glow';
    case Link = 'link';
    case Outline = 'outline';
    case Solid = 'solid';
}
