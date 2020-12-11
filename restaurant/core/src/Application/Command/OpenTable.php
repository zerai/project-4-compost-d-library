<?php declare(strict_types=1);

namespace Restaurant\Core\Application\Command;

use Restaurant\Core\Domain\Model\Table\TableId;

class OpenTable
{
    public TableId $tableId;
    public int $tableNumber;
    public string $waiter;

    public function __construct(string $tableId, int $tableNumber, string $waiter)
    {
        $this->tableId = TableId::fromString($tableId);
        $this->tableNumber = $tableNumber;
        $this->waiter = $waiter;
    }

    public function tableId(): TableId
    {
        return $this->tableId;
    }

    public function tableNumber(): int
    {
        return $this->tableNumber;
    }

    public function waiter(): string
    {
        return $this->waiter;
    }


}