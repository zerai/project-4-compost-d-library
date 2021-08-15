<?php declare(strict_types=1);


namespace Restaurant\SharedKernel\Domain;

use Ramsey\Uuid\UuidInterface;

interface UuidFactory
{
    public function create(): UuidInterface;
}