<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Benefit;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait BenefitsProperty
{
    /**
     * @var ObjectStorage<Benefit>|null
     */
    protected ?ObjectStorage $benefits = null;

    /**
     * Add an organization to the storage
     *
     * @param Benefit $organization
     *
     * @return void
     */
    public function addBenefit(Benefit $organization): void
    {
        if ($this->benefits === null) {
            $this->benefits = new ObjectStorage();
        }
        $this->benefits->attach($organization);
    }

    /**
     * Remove an organization from the storage
     *
     * @param Benefit $organization
     *
     * @return void
     */
    public function removeBenefit(Benefit $organization): void
    {
        if ($this->benefits !== null) {
            $this->benefits->detach($organization);
        }
    }

    /**
     * Remove all benefits from the storage
     *
     * @return void
     */
    public function removeAllBenefits(): void
    {
        $this->benefits = new ObjectStorage();
    }

    /**
     * Get all hiring organizations
     *
     * @return ObjectStorage<Benefit>|null
     */
    public function getBenefits(): ?ObjectStorage
    {
        return $this->benefits;
    }

    /**
     * @param ObjectStorage<Benefit>|null $benefits
     *
     * @return void
     */
    public function setBenefits(?ObjectStorage $benefits): void
    {
        $this->benefits = $benefits;
    }

    /**
     * Get hiring organizations as array
     *
     * @return array<Benefit>
     */
    public function getBenefitsArray(): array
    {
        return $this->benefits?->toArray() ?? [];
    }
}
