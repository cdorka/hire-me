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

use ChristianDorka\HireMe\Domain\DTO\TtContentFilter;
use ChristianDorka\HireMe\Enum\Generation;
use CpCompartner\Base\Core\Pattern\Result;
use CpCompartner\Base\Core\Repository\Constraints\CollectionConstraintBuilder;
use CpCompartner\Base\Core\Repository\ExtendedRepository;
use Throwable;

abstract class AbstractConfigurableRepository extends ExtendedRepository
{
    public function __construct(protected readonly CollectionConstraintBuilder $constraintBuilder)
    {
        parent::__construct();
        $this->initializeObjectType();
    }

    /**
     * Template method for finding entities by configuration
     */
    public function findByConfig(TtContentFilter $config): Result
    {
        // Step 1: Guard clause: Check if feature is enabled
        if (!$this->isFeatureEnabled($config)) {
            return Result::success([], 1752818970);
        }

        // Step 2: Guard clause: Validate category type is GENERATED
        $typeEnum = $this->getTypeEnum($config);
        if ($typeEnum !== Generation::GENERATED) {
            return Result::error(
                1752818971,
                [
                    'message' => sprintf(
                        '%s::findByConfig() requires categoryType to be GENERATED, got %s',
                        static::class,
                        $typeEnum->name ?? 'null'
                    )
                ]
            );
        }

        // Step 3: Extract configuration values
        $queryParams = $this->extractQueryParameters($config);

        // Step 4: Execute query with extracted parameters
        try {
            return $this->findWithResult(
                orderBy: $queryParams['orderBy'],
                startingPoints: $queryParams['startingPoints'],
                includeStartingPoints: $queryParams['includeStartingPoints'],
                depth: $queryParams['depth']
            );
        } catch (Throwable $e) {
            return Result::error(
                1752818972,
                ['message' => $e->getMessage()]
            );
        }
    }

    /**
     * Initialize object type if needed (override in subclasses)
     */
    protected function initializeObjectType(): void
    {
        // Default: no specific object type
    }

    /**
     * Extract query parameters from configuration
     */
    private function extractQueryParameters(TtContentFilter $config): array
    {
        $orderByField = $this->getOrderByEnum($config)->getTcaFieldName();
        $orderDirection = $this->getOrderDirectionEnum($config)->getOrderByValue();

        return [
            'orderBy' => [$orderByField => $orderDirection],
            'startingPoints' => $this->getStartingPoints($config),
            'includeStartingPoints' => $this->getIncludeStartingPoints($config) ?? true,
            'depth' => $this->getDepth($config)
        ];
    }

    // Abstract methods to be implemented by concrete repositories
    abstract protected function isFeatureEnabled(TtContentFilter $config): bool;
    abstract protected function getTypeEnum(TtContentFilter $config): Generation;
    abstract protected function getOrderByEnum(TtContentFilter $config);
    abstract protected function getOrderDirectionEnum(TtContentFilter $config);
    abstract protected function getStartingPoints(TtContentFilter $config);
    abstract protected function getIncludeStartingPoints(TtContentFilter $config): ?bool;
    abstract protected function getDepth(TtContentFilter $config);
}
