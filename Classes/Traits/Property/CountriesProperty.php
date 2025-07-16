<?php

/*
 * This file is part of the TYPO3 CMS extension "hire_me".
 *
 * Copyright (C) 2025-2025 Christian Dorka <mail@christiandorka.de>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Country;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
trait CountriesProperty
{
    /**
     * @var ObjectStorage<Country>|null
     */
    protected ?ObjectStorage $countries = null;

    /**
     * @param Country $country
     *
     * @return void
     */
    public function addCountry(Country $country): void
    {
        $this->countries->attach($country);
    }

    /**
     * @param Country $country
     *
     * @return void
     */
    public function removeCountry(Country $country): void
    {
        $this->countries->detach($country);
    }

    /**
     * @return void
     */
    public function removeAllCountries(): void
    {
        $this->countries = new ObjectStorage();
    }

    /**
     * @return null|array
     */
    public function getCountries(): ?array
    {
        return $this->countries?->toArray();
    }

    /**
     * @param ObjectStorage<Country>|null $countries
     *
     * @return void
     */
    public function setCountries(?ObjectStorage $countries): void
    {
        $this->countries = $countries;
    }
}
