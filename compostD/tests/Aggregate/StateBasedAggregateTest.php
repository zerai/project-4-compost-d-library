<?php declare(strict_types=1);

namespace CompostD\Tests\Aggregate;

use PHPUnit\Framework\TestCase;

class StateBasedAggregateTest extends TestCase
{
    /** @test */
    public function can_record_and_release_one_event(): void
    {
        $aggregate = new DummyStateBasedAggregate();

        $aggregate->task();
        $outputEvents = $aggregate->releaseEvents();

        self::assertNotEmpty($outputEvents);
        self::assertEquals(1, \count($outputEvents));
    }

    /** @test */
    public function can_record_and_release_multiple_events(): void
    {
        $aggregate = new DummyStateBasedAggregate();

        $aggregate->task();
        $aggregate->task();
        $aggregate->task();
        $outputEvents = $aggregate->releaseEvents();

        self::assertNotEmpty($outputEvents);
        self::assertEquals(3, \count($outputEvents));
    }

    /** @test */
    public function recorded_events_should_be_empty_after_release_method_call(): void
    {
        $aggregate = new DummyStateBasedAggregate();
        $aggregate->task();
        $aggregate->task();
        $aggregate->releaseEvents();

        $recordedEvents = $aggregate->releaseEvents();

        self::assertEmpty($recordedEvents);
        self::assertEquals(0, \count($recordedEvents));
    }
}