<?php declare(strict_types=1);

namespace Restaurant\Core\Tests\Table;

use PHPUnit\Framework\TestCase;
use Restaurant\Core\Domain\Model\Table\Event\TableOpened;
use Restaurant\Core\Domain\Model\Table\Table;
use Restaurant\Core\Domain\Model\Table\TableId;
use Restaurant\Core\Tests\Fixture\UuidFixture;

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

    /** @test */
    public function call_to_method_open_should_record_an_event(): void
    {
        $tableId = UuidFixture::UUID_FIRST;
        $tableNumber = (int)1;
        $waiter = (string)'joe';
        $expectedEvents = [new TableOpened(TableId::fromString($tableId), $tableNumber, $waiter)];
        $sut = Table::open(TableId::fromString($tableId), $tableNumber, $waiter);

        $recordedEvents = $sut->releaseEvents();

        self::assertNotEmpty($recordedEvents);
        self::assertEquals($expectedEvents, $recordedEvents);
    }
}
