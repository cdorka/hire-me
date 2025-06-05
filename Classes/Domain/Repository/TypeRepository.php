<?php

declare(strict_types=1);


namespace ChristianDorka\HireMe\Domain\Repository;

use CpCompartner\Base\Core\Pattern\Result;
use CpCompartner\Base\Core\Repository\ExtendedRepository;

class TypeRepository extends ExtendedRepository
{
    public function findByConfigWithResult(
    ): Result {
        $query = $this->createQuery();

        return $this->findWithResult();
    }
}
