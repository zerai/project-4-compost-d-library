<?php declare(strict_types=1);

namespace Restaurant\Tests\Table;

use PHPUnit\Framework\TestCase;
use Restaurant\Domain\Model\Table\Table;
use Restaurant\Domain\Model\Table\TableId;
use Restaurant\Tests\Fixture\UuidFixture;

class TableTest extends TestCase
{
    /** @test */
    public function table_can_be_open(): void
    {
        $tableId = UuidFixture::UUID_FIRST;
        $tableNumber = (int)1;
        $waiter = (string)'joe';

        $sut = Table::open(TableId::fromString($tableId), $tableNumber, $waiter);

        self::assertTrue($sut->id()->equals(TableId::fromString($tableId)));
        self::assertEquals($tableNumber, $sut->number());
        self::assertEquals($waiter, $sut->waiter());
    }
}
