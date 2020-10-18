<?php

declare(strict_types=1);

namespace CompostD\Tests\Clock;

use CompostD\Clock\SystemClock;
use PHPUnit\Framework\TestCase;

class SystemClockTest extends TestCase
{
    /** @test */
    public function it_generates_very_precise_date_time_immutables(): void
    {
        $clock = new SystemClock();
        $d1 = $clock->dateTime();
        $d2 = $clock->dateTime();
        $this->assertTrue($d1 < $d2);
    }
}
