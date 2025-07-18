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

namespace ChristianDorka\HireMe\Helper;

use ChristianDorka\HireMe\Configuration\Localization;
use ChristianDorka\HireMe\Enum\Depth;
use ChristianDorka\HireMe\Enum\Operator;
use ChristianDorka\HireMe\Enum\OrderBy;
use ChristianDorka\HireMe\Enum\OrderDirection;

class FieldHelper
{

    public static function createGeneratedOrderByField(string $fieldName, int $default = OrderBy::TITLE->value, ?array $displayCond = null): array
    {
        return [
            'exclude' => true,
            'label' => Localization::forLabel($fieldName),
            'description' => Localization::forDescription($fieldName),
            'displayCond' => $displayCond,
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => $default,
                'items' => [
                    [
                        'label' => Localization::forLabel($fieldName, OrderBy::TITLE->value),
                        'value' => OrderBy::TITLE->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, OrderBy::CRDATE->name),
                        'value' => OrderBy::CRDATE->value,
                    ],
                ],
            ],
        ];
    }

    public static function createOrderDirectionField(string $fieldName, int $default = OrderDirection::ASC->value, ?array $displayCond = null): array
    {
        return [
            'exclude' => true,
            'label' => Localization::forLabel($fieldName),
            'description' => Localization::forDescription($fieldName),
            'displayCond' => $displayCond,
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => $default,
                'items' => [
                    [
                        'label' => Localization::forLabel($fieldName, OrderDirection::ASC->value),
                        'value' => OrderDirection::ASC->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, OrderDirection::DESC->name),
                        'value' => OrderDirection::DESC->value,
                    ],
                ],
            ],
        ];
    }



    /**
     * Helper: Creates a depth selection field configuration
     */
    public static function createDepthField(string $fieldName, ?array $displayCond = null): array
    {
        return [
            'exclude' => true,
            'label' => Localization::forLabel($fieldName),
            'description' => Localization::forDescription($fieldName),
            'displayCond' => $displayCond,
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => Localization::forLabel($fieldName, Depth::ONLY_SELECTION->name),
                        'value' => Depth::ONLY_SELECTION->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, Depth::LEVELS_1->name),
                        'value' => Depth::LEVELS_1->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, Depth::LEVELS_2->name),
                        'value' => Depth::LEVELS_2->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, Depth::LEVELS_3->name),
                        'value' => Depth::LEVELS_3->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, Depth::LEVELS_4->name),
                        'value' => Depth::LEVELS_4->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, Depth::INFINITE->name),
                        'value' => Depth::INFINITE->value,
                    ],
                ],
                'default' => Depth::INFINITE->value,
            ],
        ];
    }

    /**
     * Helper: Creates an operator selection field configuration
     */
    public static function createOperatorField(string $fieldName, int $default = Operator::OR->value, ?array $displayCond = null): array
    {
        return [
            'exclude' => true,
            'label' => Localization::forLabel($fieldName),
            'description' => Localization::forDescription($fieldName),
            'displayCond' => $displayCond,
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => $default,
                'items' => [
                    [
                        'label' => Localization::forLabel($fieldName, Operator::OR->name),
                        'value' => Operator::OR->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, Operator::AND->name),
                        'value' => Operator::AND->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, Operator::NOR->name),
                        'value' => Operator::NOR->value,
                    ],
                    [
                        'label' => Localization::forLabel($fieldName, Operator::NAND->name),
                        'value' => Operator::NAND->value,
                    ],
                ],
            ],
        ];
    }

    /**
     * Helper: Creates a page selection field configuration
     */
    public static function createPagesField(string $fieldName, ?array $displayCond = null): array
    {
        return [
            'exclude' => true,
            'label' => Localization::forLabel($fieldName),
            'description' => Localization::forDescription($fieldName),
            'displayCond' => $displayCond,
            'config' => [
                'type' => 'group',
                'allowed' => 'pages',
                'size' => 5,
                'maxitems' => 999,
                'minitems' => 0,
                'suggestOptions' => [
                    'default' => [
                        'additionalSearchFields' => 'nav_title,url',
                    ],
                ],
            ],
        ];
    }

    /**
     * Helper: Creates a toggle field configuration
     */
    public static function createToggleField(string $fieldName, int $default = 0, ?array $displayCond = null, bool $reloadOnChange = false): array
    {
        return [
            'exclude' => true,
            'label' => Localization::forLabel($fieldName),
            'description' => Localization::forDescription($fieldName),
            'displayCond' => $displayCond,
            'onChange' => $reloadOnChange ? 'reload' : null,
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => $default,
            ],
        ];
    }

    /**
     * Helper: Creates a number field configuration
     */
    public static function createNumberField(string $fieldName, ?int $default = 0, bool $nullable = false, ?int $lower = null, ?int $upper = null, ?array $displayCond = null): array
    {

        return [
            'exclude' => true,
            'label' => Localization::forLabel($fieldName),
            'description' => Localization::forDescription($fieldName),
            'displayCond' => $displayCond,
            'config' => [
                'type' => 'number',
                'default' => $default,
                'nullable' => $nullable,
                'range' => [
                    'lower' => $lower,
                    'upper' => $upper,
                ],
            ],
        ];
    }

}
