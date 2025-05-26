<?php

declare(strict_types=1);


namespace ChristianDorka\HireMe\Domain\Repository;

use CpCompartner\Base\Core\Pattern\Result;
use CpCompartner\Base\Core\Repository\Constraints\CriteriaBuilder;
use CpCompartner\Base\Core\Repository\Repository;

class JobPostingRepository extends Repository
{
    public function findByConfigWithResult(
    ): Result {
        $criteria = new CriteriaBuilder();


        return parent::findWithResult(
        );
    }
}
