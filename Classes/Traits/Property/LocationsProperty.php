<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Location;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait LocationsProperty
{
    /**
     * @var ObjectStorage<Location>|null
     */
    protected ?ObjectStorage $locations = null;

    /**
     * Add a location to the storage
     *
     * @param Location $location
     *
     * @return void
     */
    public function addLocation(Location $location): void
    {
        $this->locations->attach($location);
    }

    /**
     * Remove a location from the storage
     *
     * @param Location $location
     *
     * @return void
     */
    public function removeLocation(Location $location): void
    {
        $this->locations->detach($location);
    }

    /**
     * Remove all locations from the storage
     *
     * @return void
     */
    public function removeAllLocations(): void
    {
        $this->locations = new ObjectStorage();
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

    /**
     * @param ObjectStorage<Location>|null $locations
     *
     * @return void
     */
    public function setLocations(?ObjectStorage $locations): void
    {
        $this->locations = $locations;
    }
}
