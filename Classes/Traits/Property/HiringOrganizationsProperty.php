<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Journey;
use ChristianDorka\HireMe\Domain\Model\Organization;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


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
     * Get the inforation if the current job posting has only one hiring organization or not
     *
     * @return bool
     */
    public function hasOnlyOneHiringOrganization(): bool
    {
        // Step 1: Guard clause: TODO
        if ($this->hiringOrganizations === null) {
            return false;
        }

        // Step 2: Guard clause: TODO
        if (count($this->hiringOrganizations->toArray()) === 1) {
            return true;
        }

        // Step 3: Guard clause: TODO
        return false;
    }

    /**
     * Get the first hiring organization if exactly one exists
     *
     * @return Organization|null
     */
    public function getFirstHiringOrganization(): ?Organization
    {
        // Step 1: Guard clause: Check if hiring organizations exist
        if ($this->hiringOrganizations === null) {
            return null;
        }

        // Step 2: Guard clause: Check if exactly one organization exists
        if (!$this->hasOnlyOneHiringOrganization()) {
            return null;
        }

        // Step 3: Return the first (and only) organization
        return $this->hiringOrganizations->toArray()[0];
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

    public function getHideHiringOrganization(): bool
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
