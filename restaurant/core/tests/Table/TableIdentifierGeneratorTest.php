<?php declare(strict_types=1);

namespace Restaurant\Core\Tests\Table;

use PHPUnit\Framework\TestCase;
use Restaurant\Core\Domain\Model\Table\Factory\TableIdentifierGenerator;
use Restaurant\Core\Domain\Model\Table\TableId;
use Restaurant\SharedKernel\Infrastructure\UuidFactoryUsingRamsey;

class TableIdentifierGeneratorTest extends TestCase
{
    /** @var TableIdentifierGenerator  */
    private $identifierGenerator;

    protected function setUp(): void
    {
        $this->identifierGenerator = new TableIdentifierGenerator(new UuidFactoryUsingRamsey());
    }

    /** @test */
    public function it_can_generate_a_tableId(): void
    {
        $tableId = $this->identifierGenerator->generateIdentity();

        self::assertInstanceOf(TableId::class, $tableId);
    }
}