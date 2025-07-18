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


use ChristianDorka\HireMe\Enum\Generation;
use ChristianDorka\HireMe\Enum\OrderBy;
use ChristianDorka\HireMe\Enum\OrderDirection;
use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
trait FilterSysCategoryProperties
{
    /**
     * @var bool
     */
    protected bool $sysCategoryEnabled = false;

    /**
     * @var int
     */
    protected int $sysCategoryType = 0;

    /**
     * @var ObjectStorage<Category>|null
     */
    protected ?ObjectStorage $sysCategoryItems = null;

    /**
     * @var string
     */
    protected string $sysCategoryStartingPoints = '';

    /**
     * @var bool
     */
    protected bool $sysCategoryIncludeStartingPoints = true;

    /**
     * @var int
     */
    protected int $sysCategoryDepth = 250;

    /**
     * @var int
     */
    protected int $sysCategoryOrderBy = 0;

    /**
     * @var int
     */
    protected int $sysCategoryOrderDirection = 0;

    /**
     * @return bool
     */
    public function getSysCategoryEnabled(): bool
    {
        return $this->sysCategoryEnabled;
    }

    /**
     * @param bool $sysCategoryEnabled
     *
     * @return void
     */
    public function setSysCategoryEnabled(bool $sysCategoryEnabled): void
    {
        $this->sysCategoryEnabled = $sysCategoryEnabled;
    }

    /**
     * @return int
     */
    public function getSysCategoryType(): int
    {
        return $this->sysCategoryType;
    }

    /**
     * @return Generation|null
     */
    public function getSysCategoryTypeEnum(): ?Generation
    {
        return Generation::tryFrom($this->sysCategoryType);
    }

    /**
     * @param int $sysCategoryType
     *
     * @return void
     */
    public function setSysCategoryType(int $sysCategoryType): void
    {
        $this->sysCategoryType = $sysCategoryType;
    }

    /**
     * @return ObjectStorage<Category>|null
     */
    public function getSysCategoryItems(): ?ObjectStorage
    {
        return $this->getSysCategoryEnabled() ? $this->sysCategoryItems : null;
    }

    /**
     * @param ObjectStorage<Category>|null $sysCategoryItems
     *
     * @return void
     */
    public function setSysCategoryItems(?ObjectStorage $sysCategoryItems): void
    {
        $this->sysCategoryItems = $sysCategoryItems;
    }

    /**
     * @return string
     */
    public function getSysCategoryStartingPoints(): string
    {
        return $this->sysCategoryStartingPoints;
    }

    /**
     * @param string $sysCategoryStartingPoints
     *
     * @return void
     */
    public function setSysCategoryStartingPoints(string $sysCategoryStartingPoints): void
    {
        $this->sysCategoryStartingPoints = $sysCategoryStartingPoints;
    }

    /**
     * @return bool
     */
    public function getSysCategoryIncludeStartingPoints(): bool
    {
        return $this->sysCategoryIncludeStartingPoints;
    }

    /**
     * @param bool $sysCategoryIncludeStartingPoints
     *
     * @return void
     */
    public function setSysCategoryIncludeStartingPoints(bool $sysCategoryIncludeStartingPoints): void
    {
        $this->sysCategoryIncludeStartingPoints = $sysCategoryIncludeStartingPoints;
    }

    /**
     * @return int
     */
    public function getSysCategoryDepth(): int
    {
        return $this->sysCategoryDepth;
    }

    /**
     * @param int $sysCategoryDepth
     *
     * @return void
     */
    public function setSysCategoryDepth(int $sysCategoryDepth): void
    {
        $this->sysCategoryDepth = $sysCategoryDepth;
    }

    /**
     * @return int
     */
    public function getSysCategoryOrderBy(): int
    {
        return $this->sysCategoryOrderBy;
    }

    /**
     * @return OrderBy|null
     */
    public function getSysCategoryOrderByEnum(): ?OrderBy
    {
        return OrderBy::tryFrom($this->sysCategoryOrderBy);
    }

    /**
     * @param int $sysCategoryOrderBy
     *
     * @return void
     */
    public function setSysCategoryOrderBy(int $sysCategoryOrderBy): void
    {
        $this->sysCategoryOrderBy = $sysCategoryOrderBy;
    }

    /**
     * @return int
     */
    public function getSysCategoryOrderDirection(): int
    {
        return $this->sysCategoryOrderDirection;
    }

    /**
     * @return OrderDirection|null
     */
    public function getSysCategoryOrderDirectionEnum(): ?OrderDirection
    {
        return OrderDirection::tryFrom($this->sysCategoryOrderDirection);
    }

    /**
     * @param int $sysCategoryOrderDirection
     *
     * @return void
     */
    public function setSysCategoryOrderDirection(int $sysCategoryOrderDirection): void
    {
        $this->sysCategoryOrderDirection = $sysCategoryOrderDirection;
    }
}
