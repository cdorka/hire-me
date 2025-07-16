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

use ChristianDorka\HireMe\Domain\Model\Department;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
trait DepartmentsProperty
{
    /**
     * @var ObjectStorage<Department>|null
     */
    protected ?ObjectStorage $departments = null;

    /**
     * @param Department $department
     *
     * @return void
     */
    public function addDepartment(Department $department): void
    {
        $this->departments->attach($department);
    }

    /**
     * @param Department $department
     *
     * @return void
     */
    public function removeDepartment(Department $department): void
    {
        $this->departments->detach($department);
    }

    /**
     * @return void
     */
    public function removeAllDepartments(): void
    {
        $this->departments = new ObjectStorage();
    }

    /**
     * @return null|array
     */
    public function getDepartments(): ?array
    {
        return $this->departments?->toArray();
    }

    /**
     * @param ObjectStorage<Department>|null $departments
     *
     * @return void
     */
    public function setDepartments(?ObjectStorage $departments): void
    {
        $this->departments = $departments;
    }
}
