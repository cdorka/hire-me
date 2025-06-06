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

use ChristianDorka\HireMe\Domain\Model\Location;
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
trait LocationsProperty
{
    /**
     * @var ObjectStorage<Location>|null
     */
    protected ?ObjectStorage $locations = null;

    /**
     * @param ObjectStorage<Location>|null $locations
     *
     * @return self
     */
    public function setLocations(?ObjectStorage $locations): self
    {
        $this->locations = $locations;
        return $this;
    }

    /**
     * Add a location to the storage
     *
     * @param Location $location
     *
     * @return self
     */
    public function addLocation(Location $location): self
    {
        $this->locations->attach($location);
        return $this;
    }

    /**
     * Remove a location from the storage
     *
     * @param Location $location
     *
     * @return self
     */
    public function removeLocation(Location $location): self
    {
        $this->locations->detach($location);
        return $this;
    }

    /**
     * Remove all locations from the storage
     *
     * @return self
     */
    public function removeAllLocations(): self
    {
        $this->locations = new ObjectStorage();
        return $this;
    }

    /**
     * Remove all locations from the storage
     *
     * @return null|array
     */
    public function getLocations(): ?array
    {
        return $this->locations?->toArray();
    }
}
