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

use ChristianDorka\HireMe\Domain\Model\Country;
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
trait FilterCountryProperties
{
    /**
     * @var bool
     */
    protected bool $countryEnabled = false;

    /**
     * @var int
     */
    protected int $countryType = 0;

    /**
     * @var ObjectStorage<Country>|null
     */
    protected ?ObjectStorage $countryItems = null;

    /**
     * @var string
     */
    protected string $countryStartingPoints = '';

    /**
     * @var bool
     */
    protected bool $countryIncludeStartingPoints = true;

    /**
     * @var int
     */
    protected int $countryDepth = 250;

    /**
     * @var int
     */
    protected int $countryOrderBy = 0;

    /**
     * @var int
     */
    protected int $countryOrderDirection = 0;

    /**
     * @return bool
     */
    public function getCountryEnabled(): bool
    {
        return $this->countryEnabled;
    }

    /**
     * @param bool $countryEnabled
     *
     * @return void
     */
    public function setCountryEnabled(bool $countryEnabled): void
    {
        $this->countryEnabled = $countryEnabled;
    }

    /**
     * @return int
     */
    public function getCountryType(): int
    {
        return $this->countryType;
    }

    /**
     * @return Generation|null
     */
    public function getCountryTypeEnum(): ?Generation
    {
        return Generation::tryFrom($this->countryType);
    }

    /**
     * @param int $countryType
     *
     * @return void
     */
    public function setCountryType(int $countryType): void
    {
        $this->countryType = $countryType;
    }

    /**
     * @return ObjectStorage<Country>|null
     */
    public function getCountryItems(): ?ObjectStorage
    {
        return $this->getCountryEnabled() ? $this->countryItems : null;
    }

    /**
     * @param ObjectStorage<Country>|null $countryItems
     *
     * @return void
     */
    public function setCountryItems(?ObjectStorage $countryItems): void
    {
        $this->countryItems = $countryItems;
    }

    /**
     * @return string
     */
    public function getCountryStartingPoints(): string
    {
        return $this->countryStartingPoints;
    }

    /**
     * @param string $countryStartingPoints
     *
     * @return void
     */
    public function setCountryStartingPoints(string $countryStartingPoints): void
    {
        $this->countryStartingPoints = $countryStartingPoints;
    }

    /**
     * @return bool
     */
    public function getCountryIncludeStartingPoints(): bool
    {
        return $this->countryIncludeStartingPoints;
    }

    /**
     * @param bool $countryIncludeStartingPoints
     *
     * @return void
     */
    public function setCountryIncludeStartingPoints(bool $countryIncludeStartingPoints): void
    {
        $this->countryIncludeStartingPoints = $countryIncludeStartingPoints;
    }

    /**
     * @return int
     */
    public function getCountryDepth(): int
    {
        return $this->countryDepth;
    }

    /**
     * @param int $countryDepth
     *
     * @return void
     */
    public function setCountryDepth(int $countryDepth): void
    {
        $this->countryDepth = $countryDepth;
    }

    /**
     * @return int
     */
    public function getCountryOrderBy(): int
    {
        return $this->countryOrderBy;
    }

    /**
     * @return OrderBy|null
     */
    public function getCountryOrderByEnum(): ?OrderBy
    {
        return OrderBy::tryFrom($this->countryOrderBy);
    }

    /**
     * @param int $countryOrderBy
     *
     * @return void
     */
    public function setCountryOrderBy(int $countryOrderBy): void
    {
        $this->countryOrderBy = $countryOrderBy;
    }

    /**
     * @return int
     */
    public function getCountryOrderDirection(): int
    {
        return $this->countryOrderDirection;
    }

    /**
     * @return OrderDirection|null
     */
    public function getCountryOrderDirectionEnum(): ?OrderDirection
    {
        return OrderDirection::tryFrom($this->countryOrderDirection);
    }

    /**
     * @param int $countryOrderDirection
     *
     * @return void
     */
    public function setCountryOrderDirection(int $countryOrderDirection): void
    {
        $this->countryOrderDirection = $countryOrderDirection;
    }
}
