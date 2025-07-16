<?php

/*
 * This file is part of the TYPO3 CMS extension "hire_me".
 *
 * Copyright (C) 2025-2025 Christian Dorka <mail@christiandorka.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Repository;

use ChristianDorka\HireMe\Domain\DTO\FilterSelection;
use ChristianDorka\HireMe\Domain\DTO\TtContentSource;
use ChristianDorka\HireMe\Domain\Model\FaqItemInterface;
use ChristianDorka\HireMe\Enum\Condition;
use CpCompartner\Base\Core\Pattern\Result;
use CpCompartner\Base\Core\Repository\Constraints\CollectionConstraintBuilder;
use CpCompartner\Base\Core\Repository\Constraints\IntegerConstraintBuilder;
use CpCompartner\Base\Core\Repository\Enums\CollectionConstraintOperator;
use CpCompartner\Base\Core\Repository\Enums\IntegerConstraintOperator;
use CpCompartner\Base\Core\Repository\ExtendedRepository;
use Doctrine\DBAL\Query\QueryException;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Localization
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
class JobPostingRepository extends ExtendedRepository
{
    public function __construct(
        private readonly FaqRepository $faqRepository,
        private readonly FaqGroupRepository $faqGroupRepository,
        private readonly CollectionConstraintBuilder $collectionConstraintBuilder,
        private readonly IntegerConstraintBuilder $integerConstraintBuilder,
    ) {
        parent::__construct();
    }

    /**
     * Find job posting by UID with result wrapper
     *
     * @param int $uid
     *
     * @return Result
     */
    public function findByUidWithResult(int $uid): Result {
        $query = $this->createQuery();

        $constraints = [
            $this->integerConstraintBuilder->build(
                query: $query,
                property: 'uid',
                operator: IntegerConstraintOperator::EQUALS,
                value: $uid,
            )
        ];

        // TODO
        try {
            return $this->findWithResult(
                constraints: $constraints,
                limit: 1,
            );
        } catch (QueryException $e) {
            return Result::error(code: 1752574213, errorArguments: ['message' => $e->getMessage()]);
        } catch (InvalidQueryException $e) {
            return Result::error(code: 1752574214, errorArguments: ['message' => $e->getMessage()]);
        }
    }

    /**
     * Find job postings by source configuration and filter selection
     */
    public function findBySourceConfigAndFilterSelectionWithResult(
        TtContentSource $sourceConfig,
        ?FilterSelection $filterSelection = null,
    ): Result {
        $query = $this->createQuery();
        $constraints = [];

        // Build constraints from source configuration
        $sourceConstraints = $this->buildSourceConstraints($query, $sourceConfig);
        $filterConstraints = $this->buildFilterConstraints($query, $filterSelection);

        $constraints = array_merge($constraints, $sourceConstraints, $filterConstraints);

        return $this->findWithResult(
            constraints: $constraints,
            limit: $sourceConfig->getLimit(),
            startingPoints: $sourceConfig->getStartingPoints(),
            includeStartingPoints: $sourceConfig->isIncludeStartingPoints(),
            depth: $sourceConfig->getDepth(),
        );
    }

    private function buildSourceConstraints(QueryInterface $query, TtContentSource $sourceConfig): array
    {
        $sourceConstraints = [];

        // Define constraint configurations
        $constraintConfigs = [
            [
                'items' => $sourceConfig->getCategoryItems(),
                'condition' => $sourceConfig->getCategoryCondition(),
                'property' => 'categories.uid'
            ],
            [
                'items' => $sourceConfig->getSysCategoryItems(),
                'condition' => $sourceConfig->getSysCategoryCondition(),
                'property' => 'sysCategories.uid'
            ],
            [
                'items' => $sourceConfig->getLocationItems(),
                'condition' => $sourceConfig->getLocationCondition(),
                'property' => 'locations.uid'
            ],
            [
                'items' => $sourceConfig->getCountryItems(),
                'condition' => $sourceConfig->getCountryCondition(),
                'property' => 'locations.country.uid'
            ],
            [
                'items' => $sourceConfig->getDepartmentItems(),
                'condition' => $sourceConfig->getDepartmentCondition(),
                'property' => 'departments.uid'
            ],
            [
                'items' => $sourceConfig->getOrganizationItems(),
                'condition' => $sourceConfig->getOrganizationCondition(),
                'property' => 'organizations.uid'
            ]
        ];

        foreach ($constraintConfigs as $config) {
            $items = $config['items']?->toArray();

            if (!empty($items)) {
                $operator = $this->getCollectionOperator($config['condition']);

                $sourceConstraints[] = $this->collectionConstraintBuilder->build(
                    query: $query,
                    property: $config['property'],
                    operator: $operator,
                    values: $items
                );
            }
        }

        return $sourceConstraints;
    }

    private function getCollectionOperator(int $condition): CollectionConstraintOperator
    {
        return match ($condition) {
            Condition::OR->value => CollectionConstraintOperator::OR_IN,
            Condition::AND->value => CollectionConstraintOperator::AND_IN,
            Condition::NOR->value => CollectionConstraintOperator::NOT_OR_IN,
            Condition::NAND->value => CollectionConstraintOperator::NOT_AND_IN,
        };
    }

    /**
     * Build constraints from filter selection
     *
     * @param QueryInterface       $query
     * @param FilterSelection|null $filterSelection
     *
     * @return array
     */
    private function buildFilterConstraints(QueryInterface $query, ?FilterSelection $filterSelection = null): array {
        if ($filterSelection === null) {
            return [];
        }

        $constraints = [];
        $types = $filterSelection->getTypes()?->toArray();

        if (!empty($types)) {
            $constraints[] = $this->collectionConstraintBuilder->build(
                query: $query,
                property: 'types.uid',
                operator: CollectionConstraintOperator::OR_IN,
                values: $types
            );
        }

        return $constraints;
    }

    /**
     * Resolve FAQ references from group field format
     * Input format: "tx_hireme_faq_123,tx_hireme_faqgroup_456"
     *
     * @return array<FaqItemInterface>
     */
    public function resolveFaqReferences(string $faqReferences): array
    {
        $faqObjects = [];

        if (empty($faqReferences)) {
            return $faqObjects;
        }

        $references = GeneralUtility::trimExplode(',', $faqReferences, true);

        foreach ($references as $reference) {
            // Split the reference into table and uid
            // Expected format: "tx_hireme_faq_2"
            $parts = explode('_', $reference);

            if (count($parts) < 2) {
                continue;
            }

            // The UID is the last part
            $uid = (int)array_pop($parts);
            // The table name is everything else joined back
            $table = implode('_', $parts);

            if ($table === 'tx_hireme_faq') {
                $faq = $this->faqRepository->findByUid($uid);
                if ($faq) {
                    $faqObjects[] = $faq;
                }
            } elseif ($table === 'tx_hireme_faqgroup') {
                $faqGroup = $this->faqGroupRepository->findByUid($uid);
                if ($faqGroup) {
                    $faqObjects[] = $faqGroup;
                }
            }
        }

        return $faqObjects;
    }

}
