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

use ChristianDorka\HireMe\Domain\Model\Scope;
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
trait FilterScopeProperties
{
    /**
     * @var bool
     */
    protected bool $scopeEnabled = false;

    /**
     * @var int
     */
    protected int $scopeType = 0;

    /**
     * @var ObjectStorage<Scope>|null
     */
    protected ?ObjectStorage $scopeItems = null;

    /**
     * @var string
     */
    protected string $scopeStartingPoints = '';

    /**
     * @var bool
     */
    protected bool $scopeIncludeStartingPoints = true;

    /**
     * @var int
     */
    protected int $scopeDepth = 250;

    /**
     * @var int
     */
    protected int $scopeOrderBy = 0;

    /**
     * @var int
     */
    protected int $scopeOrderDirection = 0;

    /**
     * @return bool
     */
    public function getScopeEnabled(): bool
    {
        return $this->scopeEnabled;
    }

    /**
     * @param bool $scopeEnabled
     *
     * @return void
     */
    public function setScopeEnabled(bool $scopeEnabled): void
    {
        $this->scopeEnabled = $scopeEnabled;
    }

    /**
     * @return int
     */
    public function getScopeType(): int
    {
        return $this->scopeType;
    }

    /**
     * @return Generation|null
     */
    public function getScopeTypeEnum(): ?Generation
    {
        return Generation::tryFrom($this->scopeType);
    }

    /**
     * @param int $scopeType
     *
     * @return void
     */
    public function setScopeType(int $scopeType): void
    {
        $this->scopeType = $scopeType;
    }

    /**
     * @return ObjectStorage<Scope>|null
     */
    public function getScopeItems(): ?ObjectStorage
    {
        return $this->getScopeEnabled() ? $this->scopeItems : null;
    }

    /**
     * @param ObjectStorage<Scope>|null $scopeItems
     *
     * @return void
     */
    public function setScopeItems(?ObjectStorage $scopeItems): void
    {
        $this->scopeItems = $scopeItems;
    }

    /**
     * @return string
     */
    public function getScopeStartingPoints(): string
    {
        return $this->scopeStartingPoints;
    }

    /**
     * @param string $scopeStartingPoints
     *
     * @return void
     */
    public function setScopeStartingPoints(string $scopeStartingPoints): void
    {
        $this->scopeStartingPoints = $scopeStartingPoints;
    }

    /**
     * @return bool
     */
    public function getScopeIncludeStartingPoints(): bool
    {
        return $this->scopeIncludeStartingPoints;
    }

    /**
     * @param bool $scopeIncludeStartingPoints
     *
     * @return void
     */
    public function setScopeIncludeStartingPoints(bool $scopeIncludeStartingPoints): void
    {
        $this->scopeIncludeStartingPoints = $scopeIncludeStartingPoints;
    }

    /**
     * @return int
     */
    public function getScopeDepth(): int
    {
        return $this->scopeDepth;
    }

    /**
     * @param int $scopeDepth
     *
     * @return void
     */
    public function setScopeDepth(int $scopeDepth): void
    {
        $this->scopeDepth = $scopeDepth;
    }

    /**
     * @return int
     */
    public function getScopeOrderBy(): int
    {
        return $this->scopeOrderBy;
    }

    /**
     * @return OrderBy|null
     */
    public function getScopeOrderByEnum(): ?OrderBy
    {
        return OrderBy::tryFrom($this->scopeOrderBy);
    }

    /**
     * @param int $scopeOrderBy
     *
     * @return void
     */
    public function setScopeOrderBy(int $scopeOrderBy): void
    {
        $this->scopeOrderBy = $scopeOrderBy;
    }

    /**
     * @return int
     */
    public function getScopeOrderDirection(): int
    {
        return $this->scopeOrderDirection;
    }

    /**
     * @return OrderDirection|null
     */
    public function getScopeOrderDirectionEnum(): ?OrderDirection
    {
        return OrderDirection::tryFrom($this->scopeOrderDirection);
    }

    /**
     * @param int $scopeOrderDirection
     *
     * @return void
     */
    public function setScopeOrderDirection(int $scopeOrderDirection): void
    {
        $this->scopeOrderDirection = $scopeOrderDirection;
    }
}
