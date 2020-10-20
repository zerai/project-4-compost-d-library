<?php declare(strict_types=1);

namespace CompostD\Tests\Aggregate;

use CompostD\Aggregate\StateBasedAggregateBehaviour;

class DummyStateBasedAggregate
{
    use StateBasedAggregateBehaviour;

    public function task(): void
    {
        $this->recordThat(new \stdClass());
    }
}