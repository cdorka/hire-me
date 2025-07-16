<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\DTO;

use ChristianDorka\HireMe\Domain\Model\Category;
use ChristianDorka\HireMe\Domain\Model\Country;
use ChristianDorka\HireMe\Domain\Model\Department;
use ChristianDorka\HireMe\Domain\Model\Location;
use TYPO3\CMS\Extbase\Domain\Model\Category as SysCategory;
use ChristianDorka\HireMe\Domain\Model\Organization;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Content Element Model for tt_content
 */
class TtContentSource extends AbstractEntity
{
    protected ?int $limit = null;
    protected ?string $startingPoints = null;
    protected bool $includeStartingPoints = true;
    protected int $depth = 250;
    /** @var ObjectStorage<Category>|null */
    protected ?ObjectStorage $categoryItems = null;
    protected int $categoryCondition = 0;
    /** @var ObjectStorage<SysCategory>|null */
    protected ?ObjectStorage $sysCategoryItems = null;
    protected int $sysCategoryCondition = 0;
    /** @var ObjectStorage<Location>|null */
    protected ?ObjectStorage $locationItems = null;
    protected int $locationCondition = 0;
    /** @var ObjectStorage<Country>|null */
    protected ?ObjectStorage $countryItems = null;
    protected int $countryCondition = 0;
    /** @var ObjectStorage<Department>|null */
    protected ?ObjectStorage $departmentItems = null;
    protected int $departmentCondition = 0;
    /** @var ObjectStorage<Organization>|null */
    protected ?ObjectStorage $organizationItems = null;
    protected int $organizationCondition = 0;

    public function __construct(
        ?int $limit = null,
        ?string $startingPoints = null,
        bool $includeStartingPoints = true,
        int $depth = 250,
        ?ObjectStorage $categoryItems = null,
        int $categoryCondition = 0,
        ?ObjectStorage $sysCategoryItems = null,
        int $sysCategoryCondition = 0,
        ?ObjectStorage $locationItems = null,
        int $locationCondition = 0,
        ?ObjectStorage $countryItems = null,
        int $countryCondition = 0,
        ?ObjectStorage $departmentItems = null,
        int $departmentCondition = 0,
        ?ObjectStorage $organizationItems = null,
        int $organizationCondition = 0,
    ) {
        $this->limit = $limit;
        $this->startingPoints = $startingPoints;
        $this->includeStartingPoints = $includeStartingPoints;
        $this->depth = $depth;
        $this->categoryCondition = $categoryCondition;
        $this->sysCategoryCondition = $sysCategoryCondition;
        $this->locationCondition = $locationCondition;
        $this->countryCondition = $countryCondition;
        $this->departmentCondition = $departmentCondition;
        $this->organizationCondition = $organizationCondition;

        $this->categoryItems = $categoryItems ?? new ObjectStorage();
        $this->sysCategoryItems = $sysCategoryItems ?? new ObjectStorage();
        $this->locationItems = $locationItems ?? new ObjectStorage();
        $this->countryItems = $countryItems ?? new ObjectStorage();
        $this->departmentItems = $departmentItems ?? new ObjectStorage();
        $this->organizationItems = $organizationItems ?? new ObjectStorage();
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    public function getStartingPoints(): ?string
    {
        return $this->startingPoints;
    }

    public function setStartingPoints(?string $startingPoints): void
    {
        $this->startingPoints = $startingPoints;
    }

    public function isIncludeStartingPoints(): bool
    {
        return $this->includeStartingPoints;
    }

    public function setIncludeStartingPoints(bool $includeStartingPoints): void
    {
        $this->includeStartingPoints = $includeStartingPoints;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    public function setDepth(int $depth): void
    {
        $this->depth = $depth;
    }

    public function getCategoryItems(): ?ObjectStorage
    {
        return $this->categoryItems;
    }

    public function setCategoryItems(?ObjectStorage $categoryItems): void
    {
        $this->categoryItems = $categoryItems;
    }

    public function getCategoryCondition(): int
    {
        return $this->categoryCondition;
    }

    public function setCategoryCondition(int $categoryCondition): void
    {
        $this->categoryCondition = $categoryCondition;
    }

    public function getSysCategoryItems(): ?ObjectStorage
    {
        return $this->sysCategoryItems;
    }

    public function setSysCategoryItems(?ObjectStorage $sysCategoryItems): void
    {
        $this->sysCategoryItems = $sysCategoryItems;
    }

    public function getSysCategoryCondition(): int
    {
        return $this->sysCategoryCondition;
    }

    public function setSysCategoryCondition(int $sysCategoryCondition): void
    {
        $this->sysCategoryCondition = $sysCategoryCondition;
    }

    public function getLocationItems(): ?ObjectStorage
    {
        return $this->locationItems;
    }

    public function setLocationItems(?ObjectStorage $locationItems): void
    {
        $this->locationItems = $locationItems;
    }

    public function getLocationCondition(): int
    {
        return $this->locationCondition;
    }

    public function setLocationCondition(int $locationCondition): void
    {
        $this->locationCondition = $locationCondition;
    }

    public function getCountryItems(): ?ObjectStorage
    {
        return $this->countryItems;
    }

    public function setCountryItems(?ObjectStorage $countryItems): void
    {
        $this->countryItems = $countryItems;
    }

    public function getCountryCondition(): int
    {
        return $this->countryCondition;
    }

    public function setCountryCondition(int $countryCondition): void
    {
        $this->countryCondition = $countryCondition;
    }

    public function getDepartmentItems(): ?ObjectStorage
    {
        return $this->departmentItems;
    }

    public function setDepartmentItems(?ObjectStorage $departmentItems): void
    {
        $this->departmentItems = $departmentItems;
    }

    public function getDepartmentCondition(): int
    {
        return $this->departmentCondition;
    }

    public function setDepartmentCondition(int $departmentCondition): void
    {
        $this->departmentCondition = $departmentCondition;
    }

    public function getOrganizationItems(): ?ObjectStorage
    {
        return $this->organizationItems;
    }

    public function setOrganizationItems(?ObjectStorage $organizationItems): void
    {
        $this->organizationItems = $organizationItems;
    }

    public function getOrganizationCondition(): int
    {
        return $this->organizationCondition;
    }

    public function setOrganizationCondition(int $organizationCondition): void
    {
        $this->organizationCondition = $organizationCondition;
    }
}
