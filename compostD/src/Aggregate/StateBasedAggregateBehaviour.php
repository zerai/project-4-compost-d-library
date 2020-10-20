<?php declare(strict_types=1);

namespace CompostD\Aggregate;

trait StateBasedAggregateBehaviour
{
    private array $recordedEvents = [];

    protected function recordThat(object $event): void
    {
        $this->recordedEvents[] = $event;
    }

    public function releaseEvents(): array
    {
        $releasedEvents = $this->recordedEvents;
        $this->recordedEvents = [];

        return $releasedEvents;
    }
}