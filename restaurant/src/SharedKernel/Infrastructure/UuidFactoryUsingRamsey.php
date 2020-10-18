<?php declare(strict_types=1);

namespace Restaurant\SharedKernel\Infrastructure;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Restaurant\SharedKernel\Domain\UuidFactory;

class UuidFactoryUsingRamsey implements UuidFactory
{
    public function create(): UuidInterface
    {
        return Uuid::uuid4();
    }
}