<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Journey;

trait JourneyProperty
{
    protected ?Journey $journey = null;

    public function getJourney(): ?Journey
    {
        return $this->journey;
    }

    public function setJourney(?Journey $journey): void
    {
        $this->journey = $journey;
    }

    public function getRenderJourney(): bool {
        return $this->journey instanceof Journey ?? false;
    }

}
