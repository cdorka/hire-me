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

namespace ChristianDorka\HireMe\Traits\Filter\Properties;

use ChristianDorka\HireMe\Domain\Model\Type;
use ChristianDorka\HireMe\Enum\Generation;
use ChristianDorka\HireMe\Enum\OrderBy;
use ChristianDorka\HireMe\Enum\OrderDirection;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
trait EmploymentTypesProperties
{
    /**
     * @var bool
     */
    protected bool $employmentTypesEnabled = false;

    /**
     * @var string
     */
    protected string $employmentTypesItems = '';

    /**
     * @return bool
     */
    public function getEmploymentTypesEnabled(): bool
    {
        return $this->employmentTypesEnabled;
    }

    /**
     * @param bool $employmentTypesEnabled
     *
     * @return void
     */
    public function setEmploymentTypesEnabled(bool $employmentTypesEnabled): void
    {
        $this->employmentTypesEnabled = $employmentTypesEnabled;
    }

    /**
     * @return string
     */
    public function getEmploymentTypesItems(): string
    {
        return $this->employmentTypesItems;
    }

    /**
     * @return int[]
     */
    public function getEmploymentTypesItemsArray(): array
    {
        return GeneralUtility::intExplode(',', $this->getEmploymentTypesItems(), true);
    }

    /**
     * @param string $employmentTypesItems
     *
     * @return void
     */
    public function setEmploymentTypesItems(string $employmentTypesItems): void
    {
        $this->employmentTypesItems = $employmentTypesItems;
    }

}
