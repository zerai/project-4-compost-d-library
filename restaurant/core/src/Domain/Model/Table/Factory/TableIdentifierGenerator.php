<?php declare(strict_types=1);

namespace Restaurant\Core\Domain\Model\Table\Factory;

use Restaurant\Core\Domain\Model\Table\TableId;
use Restaurant\SharedKernel\Domain\UuidFactory;

class TableIdentifierGenerator
{
    /** @var UuidFactory */
    private $identityGenerator;

    public function __construct(UuidFactory $identityGenerator)
    {
        $this->identityGenerator = $identityGenerator;
    }

    public function generateIdentity(): TableId
    {
        return TableId::fromString($this->identityGenerator->create()->toString());
    }
}