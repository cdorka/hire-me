<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Organization;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait HiringOrganizationsProperty
{
    /**
     * @var ObjectStorage<Organization>|null
     */
    protected ?ObjectStorage $hiringOrganizations = null;

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
}
