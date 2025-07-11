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

use InvalidArgumentException;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
class TtContentPagination extends AbstractEntity
{
    protected bool $enabled = true;
    protected bool $positionTop = false;
    protected bool $positionBottom = true;
    protected bool $showDots = true;
    protected bool $showPrevNext = true;
    protected bool $showFirstLast = true;
    protected ?int $maxLinks = null;
    protected ?int $itemsPerPage = null;

    public function __construct(
        bool $enabled = true,
        bool $positionTop = false,
        bool $positionBottom = true,
        bool $showDots = true,
        bool $showPrevNext = true,
        bool $showFirstLast = true,
        ?int $maxLinks = null,
        ?int $itemsPerPage = null,
    ) {
        $this->enabled = $enabled;
        $this->positionTop = $positionTop;
        $this->positionBottom = $positionBottom;
        $this->showDots = $showDots;
        $this->maxLinks = $maxLinks;
        $this->itemsPerPage = $itemsPerPage;
        $this->showPrevNext = $showPrevNext;
        $this->showFirstLast = $showFirstLast;
    }
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getPositionTop(): bool
    {
        return $this->positionTop;
    }

    public function setPositionTop(bool $positionTop): void
    {
        $this->positionTop = $positionTop;
    }

    public function getPositionBottom(): bool
    {
        return $this->positionBottom;
    }

    public function setPositionBottom(bool $positionBottom): void
    {
        $this->positionBottom = $positionBottom;
    }

    public function getShowDots(): bool
    {
        return $this->showDots;
    }

    public function setShowDots(bool $showDots): void
    {
        $this->showDots = $showDots;
    }

    public function getMaxLinks(): ?int
    {
        return $this->maxLinks;
    }

    public function setMaxLinks(?int $maxLinks): void
    {
        $this->maxLinks = $maxLinks;
    }

    public function getItemsPerPage(): ?int
    {
        return $this->itemsPerPage;
    }

    public function setItemsPerPage(?int $itemsPerPage): void
    {
        if ($itemsPerPage !== null && $itemsPerPage < 1) {
            throw new InvalidArgumentException('$itemsPerPage must be null or a positive integer greater than 0.', 1752219213);
        }
        $this->itemsPerPage = $itemsPerPage;
    }

    public function getShowPrevNext(): bool
    {
        return $this->showPrevNext;
    }

    public function setShowPrevNext(bool $showPrevNext): void
    {
        $this->showPrevNext = $showPrevNext;
    }

    public function getShowFirstLast(): bool
    {
        return $this->showFirstLast;
    }

    public function setShowFirstLast(bool $showFirstLast): void
    {
        $this->showFirstLast = $showFirstLast;
    }
}
