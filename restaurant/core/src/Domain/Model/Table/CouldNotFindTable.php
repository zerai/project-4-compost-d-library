<?php declare(strict_types=1);

namespace Restaurant\Core\Domain\Model\Table;

use RuntimeException;

final class CouldNotFindTable extends RuntimeException
{
    public static function withTableId(TableId $tableId): self
    {
        return new self(
            \sprintf(
                'Could not find table with ID: %s',
                $tableId->toString()
            )
        );
    }
}
