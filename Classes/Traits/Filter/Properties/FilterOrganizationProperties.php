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

use ChristianDorka\HireMe\Domain\Model\Organization;
use ChristianDorka\HireMe\Enum\Generation;
use ChristianDorka\HireMe\Enum\OrderBy;
use ChristianDorka\HireMe\Enum\OrderDirection;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
trait FilterOrganizationProperties
{
    /**
     * @var bool
     */
    protected bool $organizationEnabled = false;

    /**
     * @var int
     */
    protected int $organizationType = 0;

    /**
     * @var ObjectStorage<Organization>|null
     */
    protected ?ObjectStorage $organizationItems = null;

    /**
     * @var string
     */
    protected string $organizationStartingPoints = '';

    /**
     * @var bool
     */
    protected bool $organizationIncludeStartingPoints = true;

    /**
     * @var int
     */
    protected int $organizationDepth = 250;

    /**
     * @var int
     */
    protected int $organizationOrderBy = 0;

    /**
     * @var int
     */
    protected int $organizationOrderDirection = 0;

    /**
     * @return bool
     */
    public function getOrganizationEnabled(): bool
    {
        return $this->organizationEnabled;
    }

    /**
     * @param bool $organizationEnabled
     *
     * @return void
     */
    public function setOrganizationEnabled(bool $organizationEnabled): void
    {
        $this->organizationEnabled = $organizationEnabled;
    }

    /**
     * @return int
     */
    public function getOrganizationType(): int
    {
        return $this->organizationType;
    }

    /**
     * @return Generation|null
     */
    public function getOrganizationTypeEnum(): ?Generation
    {
        return Generation::tryFrom($this->organizationType);
    }

    /**
     * @param int $organizationType
     *
     * @return void
     */
    public function setOrganizationType(int $organizationType): void
    {
        $this->organizationType = $organizationType;
    }

    /**
     * @return ObjectStorage<Organization>|null
     */
    public function getOrganizationItems(): ?ObjectStorage
    {
        return $this->getOrganizationEnabled() ? $this->organizationItems : null;
    }

    /**
     * @param ObjectStorage<Organization>|null $organizationItems
     *
     * @return void
     */
    public function setOrganizationItems(?ObjectStorage $organizationItems): void
    {
        $this->organizationItems = $organizationItems;
    }

    /**
     * @return string
     */
    public function getOrganizationStartingPoints(): string
    {
        return $this->organizationStartingPoints;
    }

    /**
     * @param string $organizationStartingPoints
     *
     * @return void
     */
    public function setOrganizationStartingPoints(string $organizationStartingPoints): void
    {
        $this->organizationStartingPoints = $organizationStartingPoints;
    }

    /**
     * @return bool
     */
    public function getOrganizationIncludeStartingPoints(): bool
    {
        return $this->organizationIncludeStartingPoints;
    }

    /**
     * @param bool $organizationIncludeStartingPoints
     *
     * @return void
     */
    public function setOrganizationIncludeStartingPoints(bool $organizationIncludeStartingPoints): void
    {
        $this->organizationIncludeStartingPoints = $organizationIncludeStartingPoints;
    }

    /**
     * @return int
     */
    public function getOrganizationDepth(): int
    {
        return $this->organizationDepth;
    }

    /**
     * @param int $organizationDepth
     *
     * @return void
     */
    public function setOrganizationDepth(int $organizationDepth): void
    {
        $this->organizationDepth = $organizationDepth;
    }

    /**
     * @return int
     */
    public function getOrganizationOrderBy(): int
    {
        return $this->organizationOrderBy;
    }

    /**
     * @return OrderBy|null
     */
    public function getOrganizationOrderByEnum(): ?OrderBy
    {
        return OrderBy::tryFrom($this->organizationOrderBy);
    }

    /**
     * @param int $organizationOrderBy
     *
     * @return void
     */
    public function setOrganizationOrderBy(int $organizationOrderBy): void
    {
        $this->organizationOrderBy = $organizationOrderBy;
    }

    /**
     * @return int
     */
    public function getOrganizationOrderDirection(): int
    {
        return $this->organizationOrderDirection;
    }

    /**
     * @return OrderDirection|null
     */
    public function getOrganizationOrderDirectionEnum(): ?OrderDirection
    {
        return OrderDirection::tryFrom($this->organizationOrderDirection);
    }

    /**
     * @param int $organizationOrderDirection
     *
     * @return void
     */
    public function setOrganizationOrderDirection(int $organizationOrderDirection): void
    {
        $this->organizationOrderDirection = $organizationOrderDirection;
    }
}
