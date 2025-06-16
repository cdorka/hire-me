<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Milestone;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

trait MilestonesProperty
{
    /**
     * @var ObjectStorage<Milestone>|null
     */
    protected ?ObjectStorage $milestones = null;

    /**
     * @param Milestone $milestone
     *
     * @return void
     */
    public function addHiringMilestone(Milestone $milestone): void
    {
        if ($this->milestones === null) {
            $this->milestones = new ObjectStorage();
        }
        $this->milestones->attach($milestone);
    }

    /**
     * @param Milestone $milestone
     *
     * @return void
     */
    public function removeHiringMilestone(Milestone $milestone): void
    {
        if ($this->milestones !== null) {
            $this->milestones->detach($milestone);
        }
    }

    /**
     * @return void
     */
    public function removeAllMilestones(): void
    {
        $this->milestones = new ObjectStorage();
    }

    /**
     * @return ObjectStorage<Milestone>|null
     */
    public function getMilestones(): ?ObjectStorage
    {
        return $this->milestones;
    }

    /**
     * @param ObjectStorage<Milestone>|null $milestones
     *
     * @return void
     */
    public function setMilestones(?ObjectStorage $milestones): void
    {
        $this->milestones = $milestones;
    }

    /**
     * @return array<Milestone>
     */
    public function getMilestonesArray(): array
    {
        return $this->milestones?->toArray() ?? [];
    }
}
