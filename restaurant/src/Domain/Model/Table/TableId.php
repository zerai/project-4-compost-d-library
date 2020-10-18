<?php
declare(strict_types=1);

namespace Restaurant\Domain\Model\Table;

use Assert\Assertion;

final class TableId
{
    private string $id;

    public static function fromString(string $tableId): TableId
    {
        return new self($tableId);
    }

    private function __construct(string $tableId)
    {
        Assertion::uuid($tableId);
        $this->id = $tableId;
    }

    public function toString(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function equals(TableId $other): bool
    {
        return $this->id === $other->id;
    }
}
