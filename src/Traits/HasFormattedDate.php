<?php

namespace SAlexsan\TaskManager\Traits;

use DateTime;

trait HasFormattedDate
{
    public function formatDate(DateTime $date, string $format = 'd/m/Y H:i'): string
    {
        return $date->format($format);
    }
}
