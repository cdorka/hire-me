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

use ChristianDorka\HireMe\Traits\Filter\Properties\FilterCategoryProperties;
use ChristianDorka\HireMe\Traits\Filter\Properties\FilterCountryProperties;
use ChristianDorka\HireMe\Traits\Filter\Properties\FilterDepartmentProperties;
use ChristianDorka\HireMe\Traits\Filter\Properties\FilterLocationProperties;
use ChristianDorka\HireMe\Traits\Filter\Properties\FilterOrganizationProperties;
use ChristianDorka\HireMe\Traits\Filter\Properties\FilterScopeProperties;
use ChristianDorka\HireMe\Traits\Filter\Properties\FilterSysCategoryProperties;
use ChristianDorka\HireMe\Traits\Filter\Properties\FilterTypeProperties;
use TYPO3\CMS\Core\Utility\GeneralUtility;
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
    use FilterCategoryProperties;
    use FilterSysCategoryProperties;
    use FilterLocationProperties;
    use FilterCountryProperties;
    use FilterDepartmentProperties;
    use FilterOrganizationProperties;
    use FilterScopeProperties;
    use FilterTypeProperties;

    protected string $employmentTypes = '';
    protected string $careerLevels = '';

    public function __construct(


    ) {
        $this->categoryItems = new ObjectStorage();
        $this->sysCategoryItems = new ObjectStorage();
        $this->locationItems = new ObjectStorage();
        $this->countryItems = new ObjectStorage();
        $this->departmentItems = new ObjectStorage();
        $this->organizationItems = new ObjectStorage();
        $this->scopeItems = new ObjectStorage();


    }









    public function getEmploymentTypes(): string
    {
        return $this->employmentTypes;
    }
    /**
     * @return int[]
     */
    public function getEmploymentTypesArray(): array
    {
        return GeneralUtility::intExplode(',', $this->getEmploymentTypes(), true);
    }

    public function setEmploymentTypes(string $employmentTypes): void
    {
        $this->employmentTypes = $employmentTypes;
    }

    public function getCareerLevels(): string
    {
        return $this->careerLevels;
    }
    /**
     * @return int[]
     */
    public function getCareerLevelsArray(): array
    {
        return GeneralUtility::intExplode(',', $this->getCareerLevels(), true);
    }

    public function setCareerLevels(string $careerLevels): void
    {
        $this->careerLevels = $careerLevels;
    }



}
