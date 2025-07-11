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

namespace ChristianDorka\HireMe\Utility;

use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;

/**
 * Utility class for safe data mapping from tt_content records.
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
class DataMapperUtility
{
    public function __construct(protected DataMapper $dataMapper) {
    }

    /**
     * Maps a single record into an object and returns the first mapped item or null.
     * @template T
     *
     * @param class-string<T> $className
     * @param array           $data
     *
     * @return T|null
     */
    public function mapFirstItem(string $className, array $data)
    {
        /** @var T[]|null $result */
        $result = $this->dataMapper->map($className, [$data]);
        return $result[0] ?? null;
    }
}
