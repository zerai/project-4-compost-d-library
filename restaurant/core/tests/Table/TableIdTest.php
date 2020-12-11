<?php declare(strict_types=1);

namespace Restaurant\Core\Tests\Table;

use PHPUnit\Framework\TestCase;
use Restaurant\Core\Domain\Model\Table\TableId;
use Restaurant\Core\Tests\Fixture\UuidFixture;

class TableIdTest extends TestCase
{
    /** @test */
    public function it_can_be_created_from_string(): void
    {
        TableId::fromString(UuidFixture::UUID_FIRST);
    }

    /** @test */
    public function it_return_internal_value_as_string(): void
    {
        $sut = TableId::fromString(UuidFixture::UUID_FIRST);

        self::assertEquals(UuidFixture::UUID_FIRST, $sut->toString());
        self::assertEquals(UuidFixture::UUID_FIRST, $sut->__toString());
    }

    /** @test */
    public function it_can_be_compared(): void
    {
        $first = TableId::fromString(UuidFixture::UUID_FIRST);
        $second = TableId::fromString(UuidFixture::UUID_SECOND);
        $copyOfFirst = TableId::fromString(UuidFixture::UUID_FIRST);

        self::assertFalse($first->equals($second));
        self::assertTrue($first->equals($copyOfFirst));
        self::assertFalse($second->equals($copyOfFirst));
    }

    /** @test */
    public function it_throw_exception_for_invalid_value(): void
    {
        self::expectException(\Assert\InvalidArgumentException::class);
        TableId::fromString('');
    }
}