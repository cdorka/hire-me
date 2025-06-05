<?php

declare(strict_types=1);


namespace ChristianDorka\HireMe\Domain\Repository;

use ChristianDorka\HireMe\Domain\DTO\FilterDto;
use CpCompartner\Base\Core\Pattern\Result;
use CpCompartner\Base\Core\Repository\Constraints\CollectionConstraintBuilder;
use CpCompartner\Base\Core\Repository\Constraints\IntegerConstraintBuilder;
use CpCompartner\Base\Core\Repository\Enums\CollectionConstraintOperator;
use CpCompartner\Base\Core\Repository\ExtendedRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class JobPostingRepository extends ExtendedRepository
{
    public function initializeObject(): void
    {
        $querySettings = $this->createQuery()->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $querySettings->setIgnoreEnableFields(true);
        $this->setDefaultQuerySettings($querySettings);
    }


    public function findByConfigAndFilterDtoWithResult(
        ?int $limit = null,
        ?FilterDto $filterDto = null,
    ): Result {

        DebuggerUtility::var_dump($limit);
        $query = $this->createQuery();


        $collectionConstraintBuilder = GeneralUtility::makeInstance(CollectionConstraintBuilder::class);

        $constraints = [];

        if ($filterDto->getTypes()->toArray()) {
            $constraints[] = $collectionConstraintBuilder->build(
                $query,
                'type',
                CollectionConstraintOperator::OR_IN,
                $filterDto->getTypes()->toArray()
            );
        }

        DebuggerUtility::var_dump('$constraints');
        DebuggerUtility::var_dump($constraints);

        return $this->findWithResult(
            constraints: $constraints,
            limit: 1);

    }
}
