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

use ChristianDorka\HireMe\Domain\Model\Location;
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
trait FilterLocationProperties
{
    /**
     * @var bool
     */
    protected bool $locationEnabled = false;

    /**
     * @var int
     */
    protected int $locationType = 0;

    /**
     * @var ObjectStorage<Location>|null
     */
    protected ?ObjectStorage $locationItems = null;

    /**
     * @var string
     */
    protected string $locationStartingPoints = '';

    /**
     * @var bool
     */
    protected bool $locationIncludeStartingPoints = true;

    /**
     * @var int
     */
    protected int $locationDepth = 250;

    /**
     * @var int
     */
    protected int $locationOrderBy = 0;

    /**
     * @var int
     */
    protected int $locationOrderDirection = 0;

    /**
     * @return bool
     */
    public function getLocationEnabled(): bool
    {
        return $this->locationEnabled;
    }

    /**
     * @param bool $locationEnabled
     *
     * @return void
     */
    public function setLocationEnabled(bool $locationEnabled): void
    {
        $this->locationEnabled = $locationEnabled;
    }

    /**
     * @return int
     */
    public function getLocationType(): int
    {
        return $this->locationType;
    }

    /**
     * @return Generation|null
     */
    public function getLocationTypeEnum(): ?Generation
    {
        return Generation::tryFrom($this->locationType);
    }

    /**
     * @param int $locationType
     *
     * @return void
     */
    public function setLocationType(int $locationType): void
    {
        $this->locationType = $locationType;
    }

    /**
     * @return ObjectStorage<Location>|null
     */
    public function getLocationItems(): ?ObjectStorage
    {
        return $this->getLocationEnabled() ? $this->locationItems : null;
    }

    /**
     * @param ObjectStorage<Location>|null $locationItems
     *
     * @return void
     */
    public function setLocationItems(?ObjectStorage $locationItems): void
    {
        $this->locationItems = $locationItems;
    }

    /**
     * @return string
     */
    public function getLocationStartingPoints(): string
    {
        return $this->locationStartingPoints;
    }

    /**
     * @param string $locationStartingPoints
     *
     * @return void
     */
    public function setLocationStartingPoints(string $locationStartingPoints): void
    {
        $this->locationStartingPoints = $locationStartingPoints;
    }

    /**
     * @return bool
     */
    public function getLocationIncludeStartingPoints(): bool
    {
        return $this->locationIncludeStartingPoints;
    }

    /**
     * @param bool $locationIncludeStartingPoints
     *
     * @return void
     */
    public function setLocationIncludeStartingPoints(bool $locationIncludeStartingPoints): void
    {
        $this->locationIncludeStartingPoints = $locationIncludeStartingPoints;
    }

    /**
     * @return int
     */
    public function getLocationDepth(): int
    {
        return $this->locationDepth;
    }

    /**
     * @param int $locationDepth
     *
     * @return void
     */
    public function setLocationDepth(int $locationDepth): void
    {
        $this->locationDepth = $locationDepth;
    }

    /**
     * @return int
     */
    public function getLocationOrderBy(): int
    {
        return $this->locationOrderBy;
    }

    /**
     * @return OrderBy|null
     */
    public function getLocationOrderByEnum(): ?OrderBy
    {
        return OrderBy::tryFrom($this->locationOrderBy);
    }

    /**
     * @param int $locationOrderBy
     *
     * @return void
     */
    public function setLocationOrderBy(int $locationOrderBy): void
    {
        $this->locationOrderBy = $locationOrderBy;
    }

    /**
     * @return int
     */
    public function getLocationOrderDirection(): int
    {
        return $this->locationOrderDirection;
    }

    /**
     * @return OrderDirection|null
     */
    public function getLocationOrderDirectionEnum(): ?OrderDirection
    {
        return OrderDirection::tryFrom($this->locationOrderDirection);
    }

    /**
     * @param int $locationOrderDirection
     *
     * @return void
     */
    public function setLocationOrderDirection(int $locationOrderDirection): void
    {
        $this->locationOrderDirection = $locationOrderDirection;
    }
}
