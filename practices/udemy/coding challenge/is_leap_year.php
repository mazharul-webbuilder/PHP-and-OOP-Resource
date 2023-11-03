<?php

declare(strict_types=1);

function isLeap(int $year): bool
{
    if (is_int($year / 4) ) { // Here if the given year evenly divided by 4 year is leap
        return true;
    }
    return false;
}

var_dump(isLeap(2008));
