<?php

namespace Bearly\Ui;

enum Color: string
{
    use Comparable;

    case Primary = 'primary';
    case Secondary = 'secondary';
    case Success = 'success';
    case Warning = 'warning';
    case Danger = 'danger';
    case None = 'none';
}
