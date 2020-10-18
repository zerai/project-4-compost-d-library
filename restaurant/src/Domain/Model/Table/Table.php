<?php declare(strict_types=1);


namespace Restaurant\Domain\Model\Table;


class Table
{
    private TableId $id;
    private int $tableNumber;
    private string $waiter;

    private function __construct()
    {
    }

    public static function open(TableId $tableId, int $tableNumber, string $waiter): self
    {
        $table = new self();
        $table->id = $tableId;
        $table->tableNumber = $tableNumber;
        $table->waiter = $waiter;

        return $table;
    }

    public function id(): TableId
    {
        return $this->id;
    }

    public function number(): int
    {
        return $this->tableNumber;
    }

    public function waiter(): string
    {
        return $this->waiter;
    }
}