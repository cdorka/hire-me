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

use ChristianDorka\HireMe\Domain\Model\Category;
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
trait FilterCategoryProperties
{
    /**
     * @var bool
     */
    protected bool $categoryEnabled = false;

    /**
     * @var int
     */
    protected int $categoryType = 0;

    /**
     * @var ObjectStorage<Category>|null
     */
    protected ?ObjectStorage $categoryItems = null;

    /**
     * @var string
     */
    protected string $categoryStartingPoints = '';

    /**
     * @var bool
     */
    protected bool $categoryIncludeStartingPoints = true;

    /**
     * @var int
     */
    protected int $categoryDepth = 250;

    /**
     * @var int
     */
    protected int $categoryOrderBy = 0;

    /**
     * @var int
     */
    protected int $categoryOrderDirection = 0;

    /**
     * @return bool
     */
    public function getCategoryEnabled(): bool
    {
        return $this->categoryEnabled;
    }

    /**
     * @param bool $categoryEnabled
     *
     * @return void
     */
    public function setCategoryEnabled(bool $categoryEnabled): void
    {
        $this->categoryEnabled = $categoryEnabled;
    }

    /**
     * @return int
     */
    public function getCategoryType(): int
    {
        return $this->categoryType;
    }

    /**
     * @return Generation|null
     */
    public function getCategoryTypeEnum(): ?Generation
    {
        return Generation::tryFrom($this->categoryType);
    }

    /**
     * @param int $categoryType
     *
     * @return void
     */
    public function setCategoryType(int $categoryType): void
    {
        $this->categoryType = $categoryType;
    }

    /**
     * @return ObjectStorage<Category>|null
     */
    public function getCategoryItems(): ?ObjectStorage
    {
        return $this->getCategoryEnabled() ? $this->categoryItems : null;
    }

    /**
     * @param ObjectStorage<Category>|null $categoryItems
     *
     * @return void
     */
    public function setCategoryItems(?ObjectStorage $categoryItems): void
    {
        $this->categoryItems = $categoryItems;
    }

    /**
     * @return string
     */
    public function getCategoryStartingPoints(): string
    {
        return $this->categoryStartingPoints;
    }

    /**
     * @param string $categoryStartingPoints
     *
     * @return void
     */
    public function setCategoryStartingPoints(string $categoryStartingPoints): void
    {
        $this->categoryStartingPoints = $categoryStartingPoints;
    }

    /**
     * @return bool
     */
    public function getCategoryIncludeStartingPoints(): bool
    {
        return $this->categoryIncludeStartingPoints;
    }

    /**
     * @param bool $categoryIncludeStartingPoints
     *
     * @return void
     */
    public function setCategoryIncludeStartingPoints(bool $categoryIncludeStartingPoints): void
    {
        $this->categoryIncludeStartingPoints = $categoryIncludeStartingPoints;
    }

    /**
     * @return int
     */
    public function getCategoryDepth(): int
    {
        return $this->categoryDepth;
    }

    /**
     * @param int $categoryDepth
     *
     * @return void
     */
    public function setCategoryDepth(int $categoryDepth): void
    {
        $this->categoryDepth = $categoryDepth;
    }

    /**
     * @return int
     */
    public function getCategoryOrderBy(): int
    {
        return $this->categoryOrderBy;
    }

    /**
     * @return OrderBy|null
     */
    public function getCategoryOrderByEnum(): ?OrderBy
    {
        return OrderBy::tryFrom($this->categoryOrderBy);
    }

    /**
     * @param int $categoryOrderBy
     *
     * @return void
     */
    public function setCategoryOrderBy(int $categoryOrderBy): void
    {
        $this->categoryOrderBy = $categoryOrderBy;
    }

    /**
     * @return int
     */
    public function getCategoryOrderDirection(): int
    {
        return $this->categoryOrderDirection;
    }

    /**
     * @return OrderDirection|null
     */
    public function getCategoryOrderDirectionEnum(): ?OrderDirection
    {
        return OrderDirection::tryFrom($this->categoryOrderDirection);
    }

    /**
     * @param int $categoryOrderDirection
     *
     * @return void
     */
    public function setCategoryOrderDirection(int $categoryOrderDirection): void
    {
        $this->categoryOrderDirection = $categoryOrderDirection;
    }
}
