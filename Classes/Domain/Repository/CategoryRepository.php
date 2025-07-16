<?php
declare(strict_types=1);


namespace ChristianDorka\HireMe\Domain\Repository;

use ChristianDorka\HireMe\Domain\DTO\TtContentFilter;
use ChristianDorka\HireMe\Enum\Generation;
use CpCompartner\Base\Core\Pattern\Result;
use CpCompartner\Base\Core\Repository\Constraints\CollectionConstraintBuilder;
use CpCompartner\Base\Core\Repository\Constraints\IntegerConstraintBuilder;
use CpCompartner\Base\Core\Repository\Enums\CollectionConstraintOperator;
use CpCompartner\Base\Core\Repository\ExtendedRepository;
use CpCompartner\Blog\Enum\General\LogicalOperator;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class CategoryRepository extends ExtendedRepository
{


    public function __construct(
        protected readonly CollectionConstraintBuilder $constraintBuilder,
    )
    {
        parent::__construct();
    }

    public function findByConfig(
        TtContentFilter $filter,
    ): Result {
        // Guaurd clause
        if ($filter->getCategoryEnabled() === false) {
            // return empty result if filter for category is disabled
            return Result::success([]);
        }

        $query = $this->createQuery();

        $constraints = [];



        if (($categoryType = Generation::tryFrom($filter->getCategoryType())) !== null) {

            if ($categoryType === Generation::GENERATED) {

                return $this->findWithResult(
                    constraints: $constraints,
                    startingPoints: $startingPoints ?? null,
                    includeStartingPoints: $includeStartingPoints ?? true,
                    depth: $depth ?? null,
                );

            } elseif ($categoryType === Generation::MANUALLY) {

                // Set category constraints
                if ($filter->getCategoryItems()?->count() > 0) {
                    $constraints[] = $this->constraintBuilder->build(
                        $query,
                        'uid',
                        CollectionConstraintOperator::OR_IN,
                        $filter->getCategoryItems()?->toArray()
                    );
                }
            }
        }


        return $this->findWithResult(
            constraints: $constraints,
        );
    }
}
