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

namespace ChristianDorka\HireMe\Configuration;

use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Localization
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
class Localization
{
    public const EXTENSION_KEY = 'hire_me';

    /**
     * TODO
     *
     * @param string      $field
     * @param string|null $item
     * @param string|null      $table
     *
     * @return string
     * @noinspection PhpUnused
     */
    public static function forLabel(
        string $field,
        ?string $item = null,
        ?string $table = null,
    ): string {
        $table = $table ?? 'tt_content';

        if ($item === null) {
            $labelKey = sprintf(
                '%s.%s.label',
                $table,
                $field
            );
        } else {
            $labelKey = sprintf(
                '%s.%s.items.%s.label',
                $table,
                $field,
                $item
            );
        }

        return sprintf(
            'LLL:EXT:%s/Resources/Private/Language/%s.xlf:%s',
            self::EXTENSION_KEY,
            'locallang_db',
            $labelKey
        );
    }

    /**
     * TODO
     *
     * @param string $field
     * @param string $table
     *
     * @return string
     * @noinspection PhpUnused
     */
    public static function forDescription(
        string $field,
        string $table = 'tt_content',
    ): string {
        $descriptionKey = sprintf(
            '%s.%s.description',
            $table,
            $field
        );

        return sprintf(
            'LLL:EXT:%s/Resources/Private/Language/%s.xlf:%s',
            self::EXTENSION_KEY,
            'locallang_db',
            $descriptionKey
        );
    }
}
