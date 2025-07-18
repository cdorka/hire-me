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

use ChristianDorka\HireMe\Domain\Model\Department;
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
trait FilterDepartmentProperties
{
    /**
     * @var bool
     */
    protected bool $departmentEnabled = false;

    /**
     * @var int
     */
    protected int $departmentType = 0;

    /**
     * @var ObjectStorage<Department>|null
     */
    protected ?ObjectStorage $departmentItems = null;

    /**
     * @var string
     */
    protected string $departmentStartingPoints = '';

    /**
     * @var bool
     */
    protected bool $departmentIncludeStartingPoints = true;

    /**
     * @var int
     */
    protected int $departmentDepth = 250;

    /**
     * @var int
     */
    protected int $departmentOrderBy = 0;

    /**
     * @var int
     */
    protected int $departmentOrderDirection = 0;

    /**
     * @return bool
     */
    public function getDepartmentEnabled(): bool
    {
        return $this->departmentEnabled;
    }

    /**
     * @param bool $departmentEnabled
     *
     * @return void
     */
    public function setDepartmentEnabled(bool $departmentEnabled): void
    {
        $this->departmentEnabled = $departmentEnabled;
    }

    /**
     * @return int
     */
    public function getDepartmentType(): int
    {
        return $this->departmentType;
    }

    /**
     * @return Generation|null
     */
    public function getDepartmentTypeEnum(): ?Generation
    {
        return Generation::tryFrom($this->departmentType);
    }

    /**
     * @param int $departmentType
     *
     * @return void
     */
    public function setDepartmentType(int $departmentType): void
    {
        $this->departmentType = $departmentType;
    }

    /**
     * @return ObjectStorage<Department>|null
     */
    public function getDepartmentItems(): ?ObjectStorage
    {
        return $this->getDepartmentEnabled() ? $this->departmentItems : null;
    }

    /**
     * @param ObjectStorage<Department>|null $departmentItems
     *
     * @return void
     */
    public function setDepartmentItems(?ObjectStorage $departmentItems): void
    {
        $this->departmentItems = $departmentItems;
    }

    /**
     * @return string
     */
    public function getDepartmentStartingPoints(): string
    {
        return $this->departmentStartingPoints;
    }

    /**
     * @param string $departmentStartingPoints
     *
     * @return void
     */
    public function setDepartmentStartingPoints(string $departmentStartingPoints): void
    {
        $this->departmentStartingPoints = $departmentStartingPoints;
    }

    /**
     * @return bool
     */
    public function getDepartmentIncludeStartingPoints(): bool
    {
        return $this->departmentIncludeStartingPoints;
    }

    /**
     * @param bool $departmentIncludeStartingPoints
     *
     * @return void
     */
    public function setDepartmentIncludeStartingPoints(bool $departmentIncludeStartingPoints): void
    {
        $this->departmentIncludeStartingPoints = $departmentIncludeStartingPoints;
    }

    /**
     * @return int
     */
    public function getDepartmentDepth(): int
    {
        return $this->departmentDepth;
    }

    /**
     * @param int $departmentDepth
     *
     * @return void
     */
    public function setDepartmentDepth(int $departmentDepth): void
    {
        $this->departmentDepth = $departmentDepth;
    }

    /**
     * @return int
     */
    public function getDepartmentOrderBy(): int
    {
        return $this->departmentOrderBy;
    }

    /**
     * @return OrderBy|null
     */
    public function getDepartmentOrderByEnum(): ?OrderBy
    {
        return OrderBy::tryFrom($this->departmentOrderBy);
    }

    /**
     * @param int $departmentOrderBy
     *
     * @return void
     */
    public function setDepartmentOrderBy(int $departmentOrderBy): void
    {
        $this->departmentOrderBy = $departmentOrderBy;
    }

    /**
     * @return int
     */
    public function getDepartmentOrderDirection(): int
    {
        return $this->departmentOrderDirection;
    }

    /**
     * @return OrderDirection|null
     */
    public function getDepartmentOrderDirectionEnum(): ?OrderDirection
    {
        return OrderDirection::tryFrom($this->departmentOrderDirection);
    }

    /**
     * @param int $departmentOrderDirection
     *
     * @return void
     */
    public function setDepartmentOrderDirection(int $departmentOrderDirection): void
    {
        $this->departmentOrderDirection = $departmentOrderDirection;
    }
}
