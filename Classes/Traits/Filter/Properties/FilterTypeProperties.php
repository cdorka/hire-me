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
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
trait FilterTypeProperties
{
    /**
     * @var bool
     */
    protected bool $typeEnabled = false;

    /**
     * @var int
     */
    protected int $typeType = 0;

    /**
     * @var ObjectStorage<Type>|null
     */
    protected ?ObjectStorage $typeItems = null;

    /**
     * @var string
     */
    protected string $typeStartingPoints = '';

    /**
     * @var bool
     */
    protected bool $typeIncludeStartingPoints = true;

    /**
     * @var int
     */
    protected int $typeDepth = 250;

    /**
     * @var int
     */
    protected int $typeOrderBy = 0;

    /**
     * @var int
     */
    protected int $typeOrderDirection = 0;

    /**
     * @return bool
     */
    public function getTypeEnabled(): bool
    {
        return $this->typeEnabled;
    }

    /**
     * @param bool $typeEnabled
     *
     * @return void
     */
    public function setTypeEnabled(bool $typeEnabled): void
    {
        $this->typeEnabled = $typeEnabled;
    }

    /**
     * @return int
     */
    public function getTypeType(): int
    {
        return $this->typeType;
    }

    /**
     * @return Generation|null
     */
    public function getTypeTypeEnum(): ?Generation
    {
        return Generation::tryFrom($this->typeType);
    }

    /**
     * @param int $typeType
     *
     * @return void
     */
    public function setTypeType(int $typeType): void
    {
        $this->typeType = $typeType;
    }

    /**
     * @return ObjectStorage<Type>|null
     */
    public function getTypeItems(): ?ObjectStorage
    {
        return $this->getTypeEnabled() ? $this->typeItems : null;
    }

    /**
     * @param ObjectStorage<Type>|null $typeItems
     *
     * @return void
     */
    public function setTypeItems(?ObjectStorage $typeItems): void
    {
        $this->typeItems = $typeItems;
    }

    /**
     * @return string
     */
    public function getTypeStartingPoints(): string
    {
        return $this->typeStartingPoints;
    }

    /**
     * @param string $typeStartingPoints
     *
     * @return void
     */
    public function setTypeStartingPoints(string $typeStartingPoints): void
    {
        $this->typeStartingPoints = $typeStartingPoints;
    }

    /**
     * @return bool
     */
    public function getTypeIncludeStartingPoints(): bool
    {
        return $this->typeIncludeStartingPoints;
    }

    /**
     * @param bool $typeIncludeStartingPoints
     *
     * @return void
     */
    public function setTypeIncludeStartingPoints(bool $typeIncludeStartingPoints): void
    {
        $this->typeIncludeStartingPoints = $typeIncludeStartingPoints;
    }

    /**
     * @return int
     */
    public function getTypeDepth(): int
    {
        return $this->typeDepth;
    }

    /**
     * @param int $typeDepth
     *
     * @return void
     */
    public function setTypeDepth(int $typeDepth): void
    {
        $this->typeDepth = $typeDepth;
    }

    /**
     * @return int
     */
    public function getTypeOrderBy(): int
    {
        return $this->typeOrderBy;
    }

    /**
     * @return OrderBy|null
     */
    public function getTypeOrderByEnum(): ?OrderBy
    {
        return OrderBy::tryFrom($this->typeOrderBy);
    }

    /**
     * @param int $typeOrderBy
     *
     * @return void
     */
    public function setTypeOrderBy(int $typeOrderBy): void
    {
        $this->typeOrderBy = $typeOrderBy;
    }

    /**
     * @return int
     */
    public function getTypeOrderDirection(): int
    {
        return $this->typeOrderDirection;
    }

    /**
     * @return OrderDirection|null
     */
    public function getTypeOrderDirectionEnum(): ?OrderDirection
    {
        return OrderDirection::tryFrom($this->typeOrderDirection);
    }

    /**
     * @param int $typeOrderDirection
     *
     * @return void
     */
    public function setTypeOrderDirection(int $typeOrderDirection): void
    {
        $this->typeOrderDirection = $typeOrderDirection;
    }
}
