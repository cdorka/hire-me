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

use ChristianDorka\HireMe\Domain\Model\Benefit;
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
trait BenefitsProperty
{
    /**
     * @var ObjectStorage<Benefit>|null
     */
    protected ?ObjectStorage $benefits = null;

    /**
     * @param ObjectStorage<Benefit>|null $benefits
     *
     * @return self
     */
    public function setBenefits(?ObjectStorage $benefits): self
    {
        $this->benefits = $benefits;
        return $this;
    }

    /**
     * Add an organization to the storage
     *
     * @param Benefit $organization
     *
     * @return self
     */
    public function addBenefit(Benefit $organization): self
    {
        if ($this->benefits === null) {
            $this->benefits = new ObjectStorage();
        }
        $this->benefits->attach($organization);
        return $this;
    }

    /**
     * Remove an organization from the storage
     *
     * @param Benefit $organization
     *
     * @return self
     */
    public function removeBenefit(Benefit $organization): self
    {
        if ($this->benefits !== null) {
            $this->benefits->detach($organization);
        }
        return $this;
    }

    /**
     * Remove all benefits from the storage
     *
     * @return self
     */
    public function removeAllBenefits(): self
    {
        $this->benefits = new ObjectStorage();
        return $this;
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
     * Get hiring organizations as array
     *
     * @return array<Benefit>
     */
    public function getBenefitsArray(): array
    {
        return $this->benefits?->toArray() ?? [];
    }
}
