<?php declare(strict_types=1);


namespace Restaurant\Domain\Model\Table\Event;


use Restaurant\Domain\Model\Table\TableId;

class TableOpened
{
    private TableId $tableId;
    private int $tableNumber;
    private string $waiter;

    public function __construct(TableId $tableId, int $tableNumber, string $waiter)
    {
        $this->tableId = $tableId;
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