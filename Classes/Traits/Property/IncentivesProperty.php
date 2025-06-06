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

use ChristianDorka\HireMe\Domain\Model\Incentive;
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
trait IncentivesProperty
{
    /**
     * @var ObjectStorage<Incentive>|null
     */
    protected ?ObjectStorage $incentives = null;

    /**
     * @param ObjectStorage<Incentive>|null $incentives
     *
     * @return void
     */
    public function setIncentives(?ObjectStorage $incentives): void
    {
        $this->incentives = $incentives;
    }

    /**
     * Add an incentive to the storage
     *
     * @param Incentive $incentive
     *
     * @return void
     */
    public function addIncentive(Incentive $incentive): void
    {
        if ($this->incentives === null) {
            $this->incentives = new ObjectStorage();
        }
        $this->incentives->attach($incentive);
    }

    /**
     * Remove an incentive from the storage
     *
     * @param Incentive $incentive
     *
     * @return void
     */
    public function removeIncentive(Incentive $incentive): void
    {
        if ($this->incentives !== null) {
            $this->incentives->detach($incentive);
        }
    }

    /**
     * Remove all incentives from the storage
     *
     * @return void
     */
    public function removeAllIncentives(): void
    {
        $this->incentives = new ObjectStorage();
    }

    /**
     * Get all incentives
     *
     * @return ObjectStorage<Incentive>|null
     */
    public function getIncentives(): ?ObjectStorage
    {
        return $this->incentives;
    }

    /**
     * Get incentives as array
     *
     * @return array<Incentive>
     */
    public function getIncentivesArray(): array
    {
        return $this->incentives?->toArray() ?? [];
    }
}
