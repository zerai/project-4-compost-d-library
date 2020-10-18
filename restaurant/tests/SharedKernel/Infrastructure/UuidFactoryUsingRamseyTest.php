<?php declare(strict_types=1);

namespace Restaurant\Tests\SharedKernel\Infrastructure;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Restaurant\SharedKernel\Infrastructure\UuidFactoryUsingRamsey;

/**
 * @covers \Restaurant\SharedKernel\Infrastructure\UuidFactoryUsingRamsey
 */
class UuidFactoryUsingRamseyTest extends TestCase
{
    /** @test */
    public function it_can_generate_uuid_value(): void
    {
        $factory = new UuidFactoryUsingRamsey();

        self::assertTrue(Uuid::isValid($factory->create()->toString()));
    }
}
