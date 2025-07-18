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

namespace ChristianDorka\HireMe\Domain\DTO;

use ChristianDorka\HireMe\Domain\Model\Scope;
use ChristianDorka\HireMe\Domain\Model\Type;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
class SearchSelection extends AbstractEntity
{
    public function __construct(
        /** @var ObjectStorage<Type>|null */
        protected ?ObjectStorage $types = null,
        /** @var ObjectStorage<Scope>|null */
        protected ?ObjectStorage $scopes = null,
        protected int $pageNumber = 1,
    ) {
        $this->types = $this->types ?? new ObjectStorage();
        $this->scopes = $this->scopes ?? new ObjectStorage();
    }

    /**
     * @return ObjectStorage<Type>|null
     */
    public function getTypes(): ?ObjectStorage
    {
        return $this->types;
    }

    /**
     * @param ObjectStorage<Type>|null $types
     *
     * @return void
     */
    public function setTypes(?ObjectStorage $types): void
    {
        $this->types = $types;
    }

    /**
     * @return ObjectStorage<Scope>|null
     */
    public function getScopes(): ?ObjectStorage
    {
        return $this->scopes;
    }

    /**
     * @param ObjectStorage<Scope>|null $scopes
     *
     * @return void
     */
    public function setScopes(?ObjectStorage $scopes): void
    {
        $this->scopes = $scopes;
    }

    /**
     * @return int
     */
    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     *
     * @return void
     */
    public function setPageNumber(int $pageNumber): void
    {
        $this->pageNumber = $pageNumber;
    }

}
