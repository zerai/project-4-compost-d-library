<?php

declare(strict_types=1);

namespace CompostD\Clock;

use DateTimeImmutable;

interface Clock
{
    public function dateTime(): DateTimeImmutable;

    //public function pointInTime(): PointInTime;
}
