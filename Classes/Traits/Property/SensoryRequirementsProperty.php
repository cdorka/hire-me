<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\SensoryRequirement;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait SensoryRequirementsProperty
{
    /**
     * @var ObjectStorage<SensoryRequirement>|null
     */
    protected ?ObjectStorage $sensoryRequirements = null;

    /**
     * Add a sensoryRequirement to the storage
     *
     * @param SensoryRequirement $sensoryRequirement
     *
     * @return void
     */
    public function addSensoryRequirement(SensoryRequirement $sensoryRequirement): void
    {
        if ($this->sensoryRequirements === null) {
            $this->sensoryRequirements = new ObjectStorage();
        }
        $this->sensoryRequirements->attach($sensoryRequirement);
    }

    /**
     * Remove a sensoryRequirement from the storage
     *
     * @param SensoryRequirement $sensoryRequirement
     *
     * @return void
     */
    public function removeSensoryRequirement(SensoryRequirement $sensoryRequirement): void
    {
        if ($this->sensoryRequirements !== null) {
            $this->sensoryRequirements->detach($sensoryRequirement);
        }
    }

    /**
     * Remove all sensoryRequirements from the storage
     *
     * @return void
     */
    public function removeAllSensoryRequirements(): void
    {
        $this->sensoryRequirements = new ObjectStorage();
    }

    /**
     * Get all sensoryRequirements
     *
     * @return ObjectStorage<SensoryRequirement>|null
     */
    public function getSensoryRequirements(): ?ObjectStorage
    {
        return $this->sensoryRequirements;
    }

    /**
     * @param ObjectStorage<SensoryRequirement>|null $sensoryRequirements
     *
     * @return void
     */
    public function setSensoryRequirements(?ObjectStorage $sensoryRequirements): void
    {
        $this->sensoryRequirements = $sensoryRequirements;
    }

    /**
     * Get sensoryRequirements as array
     *
     * @return array<SensoryRequirement>
     */
    public function getSensoryRequirementsArray(): array
    {
        return $this->sensoryRequirements?->toArray() ?? [];
    }
}
