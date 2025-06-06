<?php

declare(strict_types=1);


namespace ChristianDorka\HireMe\Domain\Repository;

use ChristianDorka\HireMe\Domain\DTO\FilterDto;
use CpCompartner\Base\Core\Pattern\Result;
use CpCompartner\Base\Core\Repository\Constraints\CollectionConstraintBuilder;
use CpCompartner\Base\Core\Repository\Constraints\IntegerConstraintBuilder;
use CpCompartner\Base\Core\Repository\Enums\CollectionConstraintOperator;
use CpCompartner\Base\Core\Repository\Enums\IntegerConstraintOperator;
use CpCompartner\Base\Core\Repository\ExtendedRepository;
use Doctrine\DBAL\Query\QueryException;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class JobPostingRepository extends ExtendedRepository
{

    /**
     */
    public function findByUidWithResult(
        int $uid
    ): Result {

        // TODO
        $query = $this->createQuery();
        $constraints = [];

        // TODO
        $integerConstraintBuilder = GeneralUtility::makeInstance(IntegerConstraintBuilder::class);

        // TODO
        $constraints[] = $integerConstraintBuilder->build(
            query: $query,
            property: 'uid',
            operator: IntegerConstraintOperator::EQUALS,
            value: $uid,
        );

        // TODO
        try {
            return $this->findWithResult(
                constraints: $constraints,
                limit: 1,
            );
        } catch (QueryException $e) {
            return Result::error(1, ['message' => $e->getMessage()]);
        } catch (InvalidQueryException $e) {
            return Result::error(2, ['message' => $e->getMessage()]);
        }
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
                'types.uid',
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
