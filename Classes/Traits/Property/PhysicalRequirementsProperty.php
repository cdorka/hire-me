<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\PhysicalRequirement;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait PhysicalRequirementsProperty
{
    /**
     * @var ObjectStorage<PhysicalRequirement>|null
     */
    protected ?ObjectStorage $physicalRequirements = null;

    /**
     * Add a physicalRequirement to the storage
     *
     * @param PhysicalRequirement $physicalRequirement
     *
     * @return void
     */
    public function addPhysicalRequirement(PhysicalRequirement $physicalRequirement): void
    {
        if ($this->physicalRequirements === null) {
            $this->physicalRequirements = new ObjectStorage();
        }
        $this->physicalRequirements->attach($physicalRequirement);
    }

    /**
     * Remove a physicalRequirement from the storage
     *
     * @param PhysicalRequirement $physicalRequirement
     *
     * @return void
     */
    public function removePhysicalRequirement(PhysicalRequirement $physicalRequirement): void
    {
        if ($this->physicalRequirements !== null) {
            $this->physicalRequirements->detach($physicalRequirement);
        }
    }

    /**
     * Remove all physicalRequirements from the storage
     *
     * @return void
     */
    public function removeAllPhysicalRequirements(): void
    {
        $this->physicalRequirements = new ObjectStorage();
    }

    /**
     * Get all physicalRequirements
     *
     * @return ObjectStorage<PhysicalRequirement>|null
     */
    public function getPhysicalRequirements(): ?ObjectStorage
    {
        return $this->physicalRequirements;
    }

    /**
     * @param ObjectStorage<PhysicalRequirement>|null $physicalRequirements
     *
     * @return void
     */
    public function setPhysicalRequirements(?ObjectStorage $physicalRequirements): void
    {
        $this->physicalRequirements = $physicalRequirements;
    }

    /**
     * Get physicalRequirements as array
     *
     * @return array<PhysicalRequirement>
     */
    public function getPhysicalRequirementsArray(): array
    {
        return $this->physicalRequirements?->toArray() ?? [];
    }
}
