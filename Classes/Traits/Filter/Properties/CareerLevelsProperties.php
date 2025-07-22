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
trait CareerLevelsProperties
{
    /**
     * @var bool
     */
    protected bool $careerLevelsEnabled = false;

    /**
     * @var string
     */
    protected string $careerLevelsItems = '';

    /**
     * @return bool
     */
    public function getCareerLevelsEnabled(): bool
    {
        return $this->careerLevelsEnabled;
    }

    /**
     * @param bool $careerLevelsEnabled
     *
     * @return void
     */
    public function setCareerLevelsEnabled(bool $careerLevelsEnabled): void
    {
        $this->careerLevelsEnabled = $careerLevelsEnabled;
    }

    /**
     * @return string
     */
    public function getCareerLevelsItems(): string
    {
        return $this->careerLevelsItems;
    }

    /**
     * @return int[]
     */
    public function getCareerLevelsItemsArray(): array
    {
        return GeneralUtility::intExplode(',', $this->getCareerLevelsItems(), true);
    }

    /**
     * @param string $careerLevelsItems
     *
     * @return void
     */
    public function setCareerLevelsItems(string $careerLevelsItems): void
    {
        $this->careerLevelsItems = $careerLevelsItems;
    }

}
