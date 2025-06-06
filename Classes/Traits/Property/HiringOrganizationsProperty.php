<?php

/**
 * TODO
 * php version 8.2
 *
 * @category     TODO
 * @package      TODO
 * @license      TODO
 * @author       Christian Dorka <mail@christiandorka.de>
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Organization;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
trait HiringOrganizationsProperty
{
    /**
     * @var ObjectStorage<Organization>|null
     */
    protected ?ObjectStorage $hiringOrganizations = null;

    /**
     * @param ObjectStorage<Organization>|null $hiringOrganizations
     *
     * @return self
     */
    public function setHiringOrganizations(?ObjectStorage $hiringOrganizations): self
    {
        $this->hiringOrganizations = $hiringOrganizations;
        return $this;
    }

    /**
     * Add an organization to the storage
     *
     * @param Organization $organization
     *
     * @return self
     */
    public function addHiringOrganization(Organization $organization): self
    {
        if ($this->hiringOrganizations === null) {
            $this->hiringOrganizations = new ObjectStorage();
        }
        $this->hiringOrganizations->attach($organization);
        return $this;
    }

    /**
     * Remove an organization from the storage
     *
     * @param Organization $organization
     *
     * @return self
     */
    public function removeHiringOrganization(Organization $organization): self
    {
        if ($this->hiringOrganizations !== null) {
            $this->hiringOrganizations->detach($organization);
        }
        return $this;
    }

    /**
     * Remove all hiringOrganizations from the storage
     *
     * @return self
     */
    public function removeAllHiringOrganizations(): self
    {
        $this->hiringOrganizations = new ObjectStorage();
        return $this;
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
     * Get hiring organizations as array
     *
     * @return array<Organization>
     */
    public function getHiringOrganizationsArray(): array
    {
        return $this->hiringOrganizations?->toArray() ?? [];
    }
}
