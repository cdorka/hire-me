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
use ChristianDorka\HireMe\Enum\OrderBy;
use ChristianDorka\HireMe\Enum\OrderDirection;
use TYPO3\CMS\Extbase\Domain\Model\Category;

/**
 * Scope Repository
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
class SysCategoryRepository extends AbstractConfigurableRepository
{
    protected function initializeObjectType(): void
    {
        $this->objectType = Category::class;
    }

    protected function isFeatureEnabled(TtContentFilter $config): bool
    {
        return $config->getScopeEnabled() !== false;
    }

    protected function getTypeEnum(TtContentFilter $config): Generation
    {
        return $config->getScopeTypeEnum();
    }

    protected function getOrderByEnum(TtContentFilter $config): ?OrderBy
    {
        return $config->getScopeOrderByEnum();
    }

    protected function getOrderDirectionEnum(TtContentFilter $config): ?OrderDirection
    {
        return $config->getScopeOrderDirectionEnum();
    }

    protected function getStartingPoints(TtContentFilter $config): string
    {
        return $config->getScopeStartingPoints();
    }

    protected function getIncludeStartingPoints(TtContentFilter $config): ?bool
    {
        return $config->getScopeIncludeStartingPoints();
    }

    protected function getDepth(TtContentFilter $config): int
    {
        return $config->getScopeDepth();
    }
}
