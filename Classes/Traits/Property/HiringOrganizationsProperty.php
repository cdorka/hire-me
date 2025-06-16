<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Journey;
use ChristianDorka\HireMe\Domain\Model\Organization;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;


trait HiringOrganizationsProperty
{
    /**
     * @var ObjectStorage<Organization>|null
     */
    protected ?ObjectStorage $hiringOrganizations = null;


    protected bool $hideHiringOrganization = false;

    /**
     * Add an organization to the storage
     *
     * @param Organization $organization
     *
     * @return void
     */
    public function addHiringOrganization(Organization $organization): void
    {
        if ($this->hiringOrganizations === null) {
            $this->hiringOrganizations = new ObjectStorage();
        }
        $this->hiringOrganizations->attach($organization);
    }

    /**
     * Remove an organization from the storage
     *
     * @param Organization $organization
     *
     * @return void
     */
    public function removeHiringOrganization(Organization $organization): void
    {
        if ($this->hiringOrganizations !== null) {
            $this->hiringOrganizations->detach($organization);
        }
    }

    /**
     * Remove all hiringOrganizations from the storage
     *
     * @return void
     */
    public function removeAllHiringOrganizations(): void
    {
        $this->hiringOrganizations = new ObjectStorage();
    }

    /**
     * Get all hiring organizations
     *
     * @return ObjectStorage<Organization>|null
     */
    public function getHiringOrganizations(): ?ObjectStorage
    {
        return $this->hiringOrganizations;
    }

    /**
     * @param ObjectStorage<Organization>|null $hiringOrganizations
     *
     * @return void
     */
    public function setHiringOrganizations(?ObjectStorage $hiringOrganizations): void
    {
        $this->hiringOrganizations = $hiringOrganizations;
    }

    /**
     * Get hiring organizations as array
     *
     * @return array<Organization>
     */
    public function getHiringOrganizationsArray(): array
    {
        return $this->hiringOrganizations?->toArray() ?? [];
    }

    public function isHideHiringOrganization(): bool
    {
        return $this->hideHiringOrganization;
    }

    public function setHideHiringOrganization(bool $hideHiringOrganization): void
    {
        $this->hideHiringOrganization = $hideHiringOrganization;
    }

    public function getRenderHiringOrganizations(): bool {
        if (
            $this->hideHiringOrganization === true ||
            $this->hiringOrganizations === null ||
            (is_countable($this->hiringOrganizations) && $this->hiringOrganizations->count() == 0)
        ) {
            return false;
        }

        return true;
    }
}
