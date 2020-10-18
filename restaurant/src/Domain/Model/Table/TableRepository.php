<?php
declare(strict_types=1);

namespace Restaurant\Domain\Model\Table;

interface TableRepository
{
    public function save(Table $table): void;

    /**
     * @throws CouldNotFindTable
     */
    public function withId(TableId $tableId): Table;
}
