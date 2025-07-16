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

namespace ChristianDorka\HireMe\Domain\DTO;

use ChristianDorka\HireMe\Domain\Model\Category;
use ChristianDorka\HireMe\Domain\Model\Country;
use ChristianDorka\HireMe\Domain\Model\Department;
use ChristianDorka\HireMe\Domain\Model\Location;
use ChristianDorka\HireMe\Domain\Model\Organization;
use TYPO3\CMS\Extbase\Domain\Model\Category as SysCategory;
use ChristianDorka\HireMe\Enum\Depth;
use ChristianDorka\HireMe\Enum\Generation;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Filter configuration DTO for tt_content
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
class TtContentFilter extends AbstractEntity
{
    // Categories
    protected bool $categoryEnabled = false;
    protected int $categoryType = 0;
    /**
     * @var ObjectStorage<Category>|null
     */
    protected ?ObjectStorage $categoryItems = null;
    protected ?string $categoryStartingPoints = null;
    protected bool $categoryIncludeStartingPoints = true;
    protected int $categoryDepth = 250;

    // TYPO3 sys Categories
    protected bool $sysCategoryEnabled = false;
    protected int $sysCategoryType = 0;
    /**
     * @var ObjectStorage<SysCategory>|null
     */
    protected ?ObjectStorage $sysCategoryItems = null;
    protected ?string $sysCategoryStartingPoints = null;
    protected bool $sysCategoryIncludeStartingPoints = true;
    protected int $sysCategoryDepth = 250;

    // Location
    protected bool $locationEnabled = false;
    protected int $locationType = 0;
    /**
     * @var ObjectStorage<Location>|null
     */
    protected ?ObjectStorage $locationItems = null;
    protected ?string $locationStartingPoints = null;
    protected bool $locationIncludeStartingPoints = true;
    protected int $locationDepth = 250;

    // Country
    protected bool $countryEnabled = false;
    protected int $countryType = 0;
    /**
     * @var ObjectStorage<Country>|null
     */
    protected ?ObjectStorage $countryItems = null;
    protected ?string $countryStartingPoints = null;
    protected bool $countryIncludeStartingPoints = true;
    protected int $countryDepth = 250;

    // Department
    protected bool $departmentEnabled = false;
    protected int $departmentType = 0;

    /**
     * @var ObjectStorage<Department>|null
     */
    protected ?ObjectStorage $departmentItems = null;
    protected ?string $departmentStartingPoints = null;
    protected bool $departmentIncludeStartingPoints = true;
    protected int $departmentDepth = 250;

    // Organization
    protected bool $organizationEnabled = false;
    protected int $organizationType = 0;

    /**
     * @var ObjectStorage<Organization>|null
     */
    protected ?ObjectStorage $organizationItems = null;
    protected ?string $organizationStartingPoints = null;
    protected bool $organizationIncludeStartingPoints = true;
    protected int $organizationDepth = 250;

    public function __construct(
        bool $categoryEnabled = false,
        int $categoryType = Generation::GENERATED->value,
        ?ObjectStorage $categoryItems = new ObjectStorage(),
        ?string $categoryStartingPoints = null,
        bool $categoryIncludeStartingPoints = true,
        int $categoryDepth = Depth::INFINITE->value,

        bool $sysCategoryEnabled = false,
        int $sysCategoryType = Generation::GENERATED->value,
        ?ObjectStorage $sysCategoryItems = new ObjectStorage(),
        ?string $sysCategoryStartingPoints = null,
        bool $sysCategoryIncludeStartingPoints = true,
        int $sysCategoryDepth = Depth::INFINITE->value,

        bool $locationEnabled = false,
        int $locationType = Generation::GENERATED->value,
        ?ObjectStorage $locationItems = new ObjectStorage(),
        ?string $locationStartingPoints = null,
        bool $locationIncludeStartingPoints = true,
        int $locationDepth = Depth::INFINITE->value,

        bool $countryEnabled = false,
        int $countryType = Generation::GENERATED->value,
        ?ObjectStorage $countryItems = new ObjectStorage(),
        ?string $countryStartingPoints = null,
        bool $countryIncludeStartingPoints = true,
        int $countryDepth = Depth::INFINITE->value,

        bool $departmentEnabled = false,
        int $departmentType = Generation::GENERATED->value,
        ?ObjectStorage $departmentItems = new ObjectStorage(),
        ?string $departmentStartingPoints = null,
        bool $departmentIncludeStartingPoints = true,
        int $departmentDepth = Depth::INFINITE->value,

        bool $organizationEnabled = false,
        int $organizationType = Generation::GENERATED->value,
        ?ObjectStorage $organizationItems = new ObjectStorage(),
        ?string $organizationStartingPoints = null,
        bool $organizationIncludeStartingPoints = true,
        int $organizationDepth = Depth::INFINITE->value,


    ) {
        $this->categoryEnabled = $categoryEnabled;
        $this->categoryType = $categoryType;
        $this->categoryItems = $categoryItems;
        $this->categoryStartingPoints = $categoryStartingPoints;
        $this->categoryIncludeStartingPoints = $categoryIncludeStartingPoints;
        $this->categoryDepth = $categoryDepth;

        $this->sysCategoryEnabled = $sysCategoryEnabled;
        $this->sysCategoryType = $sysCategoryType;
        $this->sysCategoryItems = $sysCategoryItems;
        $this->sysCategoryStartingPoints = $sysCategoryStartingPoints;
        $this->sysCategoryIncludeStartingPoints = $sysCategoryIncludeStartingPoints;
        $this->sysCategoryDepth = $sysCategoryDepth;

        $this->locationEnabled = $locationEnabled;
        $this->locationType = $locationType;
        $this->locationItems = $locationItems;
        $this->locationStartingPoints = $locationStartingPoints;
        $this->locationIncludeStartingPoints = $locationIncludeStartingPoints;
        $this->locationDepth = $locationDepth;

        $this->countryEnabled = $countryEnabled;
        $this->countryType = $countryType;
        $this->countryItems = $countryItems;
        $this->countryStartingPoints = $countryStartingPoints;
        $this->countryIncludeStartingPoints = $countryIncludeStartingPoints;
        $this->countryDepth = $countryDepth;

        $this->departmentEnabled = $departmentEnabled;
        $this->departmentType = $departmentType;
        $this->departmentItems = $departmentItems;
        $this->departmentStartingPoints = $departmentStartingPoints;
        $this->departmentIncludeStartingPoints = $departmentIncludeStartingPoints;
        $this->departmentDepth = $departmentDepth;

        $this->organizationEnabled = $organizationEnabled;
        $this->organizationType = $organizationType;
        $this->organizationItems = $organizationItems;
        $this->organizationStartingPoints = $organizationStartingPoints;
        $this->organizationIncludeStartingPoints = $organizationIncludeStartingPoints;
        $this->organizationDepth = $organizationDepth;
    }

    public function getCategoryEnabled(): bool
    {
        return $this->categoryEnabled;
    }

    public function setCategoryEnabled(bool $categoryEnabled): void
    {
        $this->categoryEnabled = $categoryEnabled;
    }

    public function getCategoryType(): int
    {
        return $this->categoryType;
    }

    public function setCategoryType(int $categoryType): void
    {
        $this->categoryType = $categoryType;
    }

    public function getCategoryItems(): ?ObjectStorage
    {
        return $this->categoryItems;
    }

    public function setCategoryItems(?ObjectStorage $categoryItems): void
    {
        $this->categoryItems = $categoryItems;
    }

    public function getCategoryIncludeStartingPoints(): bool
    {
        return $this->categoryIncludeStartingPoints;
    }

    public function setCategoryIncludeStartingPoints(bool $categoryIncludeStartingPoints): void
    {
        $this->categoryIncludeStartingPoints = $categoryIncludeStartingPoints;
    }

    public function getCategoryDepth(): int
    {
        return $this->categoryDepth;
    }

    public function setCategoryDepth(int $categoryDepth): void
    {
        $this->categoryDepth = $categoryDepth;
    }

    public function getSysCategoryEnabled(): bool
    {
        return $this->sysCategoryEnabled;
    }

    public function setSysCategoryEnabled(bool $sysCategoryEnabled): void
    {
        $this->sysCategoryEnabled = $sysCategoryEnabled;
    }

    public function getSysCategoryType(): int
    {
        return $this->sysCategoryType;
    }

    public function setSysCategoryType(int $sysCategoryType): void
    {
        $this->sysCategoryType = $sysCategoryType;
    }

    public function getSysCategoryItems(): ?ObjectStorage
    {
        return $this->sysCategoryItems;
    }

    public function setSysCategoryItems(?ObjectStorage $sysCategoryItems): void
    {
        $this->sysCategoryItems = $sysCategoryItems;
    }

    public function getSysCategoryIncludeStartingPoints(): bool
    {
        return $this->sysCategoryIncludeStartingPoints;
    }

    public function setSysCategoryIncludeStartingPoints(bool $sysCategoryIncludeStartingPoints): void
    {
        $this->sysCategoryIncludeStartingPoints = $sysCategoryIncludeStartingPoints;
    }

    public function getSysCategoryDepth(): int
    {
        return $this->sysCategoryDepth;
    }

    public function setSysCategoryDepth(int $sysCategoryDepth): void
    {
        $this->sysCategoryDepth = $sysCategoryDepth;
    }

    public function getLocationEnabled(): bool
    {
        return $this->locationEnabled;
    }

    public function setLocationEnabled(bool $locationEnabled): void
    {
        $this->locationEnabled = $locationEnabled;
    }

    public function getLocationType(): int
    {
        return $this->locationType;
    }

    public function setLocationType(int $locationType): void
    {
        $this->locationType = $locationType;
    }

    public function getLocationItems(): ?ObjectStorage
    {
        return $this->locationItems;
    }

    public function setLocationItems(?ObjectStorage $locationItems): void
    {
        $this->locationItems = $locationItems;
    }

    public function getLocationIncludeStartingPoints(): bool
    {
        return $this->locationIncludeStartingPoints;
    }

    public function setLocationIncludeStartingPoints(bool $locationIncludeStartingPoints): void
    {
        $this->locationIncludeStartingPoints = $locationIncludeStartingPoints;
    }

    public function getLocationDepth(): int
    {
        return $this->locationDepth;
    }

    public function setLocationDepth(int $locationDepth): void
    {
        $this->locationDepth = $locationDepth;
    }

    public function getCountryEnabled(): bool
    {
        return $this->countryEnabled;
    }

    public function setCountryEnabled(bool $countryEnabled): void {
        $this->countryEnabled = $countryEnabled;
    }

    public function getCountryType(): int
    {
        return $this->countryType;
    }

    public function setCountryType(int $countryType): void
    {
        $this->countryType = $countryType;
    }

    public function getCountryItems(): ?ObjectStorage
    {
        return $this->countryItems;
    }

    public function setCountryItems(?ObjectStorage $countryItems): void
    {
        $this->countryItems = $countryItems;
    }

    public function getCountryIncludeStartingPoints(): bool
    {
        return $this->countryIncludeStartingPoints;
    }

    public function setCountryIncludeStartingPoints(bool $countryIncludeStartingPoints): void
    {
        $this->countryIncludeStartingPoints = $countryIncludeStartingPoints;
    }

    public function getCountryDepth(): int
    {
        return $this->countryDepth;
    }

    public function setCountryDepth(int $countryDepth): void
    {
        $this->countryDepth = $countryDepth;
    }

    public function getDepartmentEnabled(): bool
    {
        return $this->departmentEnabled;
    }

    public function setDepartmentEnabled(bool $departmentEnabled): void
    {
        $this->departmentEnabled = $departmentEnabled;
    }

    public function getDepartmentType(): int
    {
        return $this->departmentType;
    }

    public function setDepartmentType(int $departmentType): void
    {
        $this->departmentType = $departmentType;
    }

    public function getDepartmentItems(): ?ObjectStorage
    {
        return $this->departmentItems;
    }

    public function setDepartmentItems(?ObjectStorage $departmentItems): void
    {
        $this->departmentItems = $departmentItems;
    }

    public function getDepartmentIncludeStartingPoints(): bool
    {
        return $this->departmentIncludeStartingPoints;
    }

    public function setDepartmentIncludeStartingPoints(bool $departmentIncludeStartingPoints): void
    {
        $this->departmentIncludeStartingPoints = $departmentIncludeStartingPoints;
    }

    public function getDepartmentDepth(): int
    {
        return $this->departmentDepth;
    }

    public function setDepartmentDepth(int $departmentDepth): void
    {
        $this->departmentDepth = $departmentDepth;
    }

    public function getOrganizationEnabled(): bool
    {
        return $this->organizationEnabled;
    }

    public function setOrganizationEnabled(bool $organizationEnabled): void
    {
        $this->organizationEnabled = $organizationEnabled;
    }

    public function getOrganizationType(): int
    {
        return $this->organizationType;
    }

    public function setOrganizationType(int $organizationType): void
    {
        $this->organizationType = $organizationType;
    }

    public function getOrganizationItems(): ?ObjectStorage
    {
        return $this->organizationItems;
    }

    public function setOrganizationItems(?ObjectStorage $organizationItems): void
    {
        $this->organizationItems = $organizationItems;
    }

    public function getOrganizationIncludeStartingPoints(): bool
    {
        return $this->organizationIncludeStartingPoints;
    }

    public function setOrganizationIncludeStartingPoints(bool $organizationIncludeStartingPoints): void
    {
        $this->organizationIncludeStartingPoints = $organizationIncludeStartingPoints;
    }

    public function getOrganizationDepth(): int
    {
        return $this->organizationDepth;
    }

    public function setOrganizationDepth(int $organizationDepth): void
    {
        $this->organizationDepth = $organizationDepth;
    }

    public function getCategoryStartingPoints(): ?string
    {
        return $this->categoryStartingPoints;
    }

    public function setCategoryStartingPoints(?string $categoryStartingPoints): void
    {
        $this->categoryStartingPoints = $categoryStartingPoints;
    }

    public function getSysCategoryStartingPoints(): ?string
    {
        return $this->sysCategoryStartingPoints;
    }

    public function setSysCategoryStartingPoints(?string $sysCategoryStartingPoints): void
    {
        $this->sysCategoryStartingPoints = $sysCategoryStartingPoints;
    }

    public function getLocationStartingPoints(): ?string
    {
        return $this->locationStartingPoints;
    }

    public function setLocationStartingPoints(?string $locationStartingPoints): void
    {
        $this->locationStartingPoints = $locationStartingPoints;
    }

    public function getCountryStartingPoints(): ?string
    {
        return $this->countryStartingPoints;
    }

    public function setCountryStartingPoints(?string $countryStartingPoints): void
    {
        $this->countryStartingPoints = $countryStartingPoints;
    }

    public function getDepartmentStartingPoints(): ?string
    {
        return $this->departmentStartingPoints;
    }

    public function setDepartmentStartingPoints(?string $departmentStartingPoints): void
    {
        $this->departmentStartingPoints = $departmentStartingPoints;
    }

    public function getOrganizationStartingPoints(): ?string
    {
        return $this->organizationStartingPoints;
    }

    public function setOrganizationStartingPoints(?string $organizationStartingPoints): void
    {
        $this->organizationStartingPoints = $organizationStartingPoints;
    }

}
