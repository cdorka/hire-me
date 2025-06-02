<?php

declare(strict_types=1);


namespace ChristianDorka\HireMe\Domain\Repository;

use CpCompartner\Base\Core\Pattern\Result;
use CpCompartner\Base\Core\Repository\Constraints\CriteriaBuilder;
use CpCompartner\Base\Core\Repository\Repository;

class JobPostingRepository extends Repository
{
    public function initializeObject(): void
    {
        $querySettings = $this->createQuery()->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $querySettings->setIgnoreEnableFields(true);
        $this->setDefaultQuerySettings($querySettings);
    }


    public function findByConfigWithResult(
    ): Result {
        $query = $this->createQuery();
        $query->matching($query->equals('uid', 1));



        return Result::success($query->execute());

    }
}
