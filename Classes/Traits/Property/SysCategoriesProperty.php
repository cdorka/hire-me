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

namespace ChristianDorka\HireMe\Traits\Property;

use TYPO3\CMS\Extbase\Domain\Model\Category as SysCategory;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
trait SysCategoriesProperty
{
    /**
     * @var ObjectStorage<SysCategory>|null
     */
    protected ?ObjectStorage $sysCategories = null;

    /**
     * @param SysCategory $sysCategory
     *
     * @return void
     */
    public function addSysCategory(SysCategory $sysCategory): void
    {
        $this->sysCategories->attach($sysCategory);
    }

    /**
     * @param SysCategory $sysCategory
     *
     * @return void
     */
    public function removeSysCategory(SysCategory $sysCategory): void
    {
        $this->sysCategories->detach($sysCategory);
    }

    /**
     * @return void
     */
    public function removeAllSysCategories(): void
    {
        $this->sysCategories = new ObjectStorage();
    }

    /**
     * @return null|array
     */
    public function getSysCategories(): ?array
    {
        return $this->sysCategories?->toArray();
    }

    /**
     * @param ObjectStorage<SysCategory>|null $sysCategories
     *
     * @return void
     */
    public function setSysCategories(?ObjectStorage $sysCategories): void
    {
        $this->sysCategories = $sysCategories;
    }
}
