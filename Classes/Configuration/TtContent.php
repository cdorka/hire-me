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

use ChristianDorka\HireMe\Enum\Condition;
use ChristianDorka\HireMe\Enum\Depth;
use ChristianDorka\HireMe\Enum\Generation;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * TODO
 *
 * @author  Christian Dorka <mail@christiandorka.de>
 * @license GPL-3.0-or-later
 */
class TtContent
{
    /** @noinspection SpellCheckingInspection */
    public const FIELD_MAPPING = [
        "category" => [
            "foreign_table" => "tx_hireme_category",
            "mm_table" => "tx_hireme_ttcontent_category_mm",
        ],
        "syscategory" => [
            "foreign_table" => "sys_category",
            "mm_table" => "tx_hireme_ttcontent_syscategory_mm",
        ],
        "location" => [
            "foreign_table" => "tx_hireme_location",
            "mm_table" => "tx_hireme_ttcontent_location_mm",
        ],
        "country" => [
            "foreign_table" => "tx_hireme_country",
            "mm_table" => "tx_hireme_ttcontent_country_mm",
        ],
        "department" => [
            "foreign_table" => "tx_hireme_department",
            "mm_table" => "tx_hireme_ttcontent_department_mm",
        ],
        "organization" => [
            "foreign_table" => "tx_hireme_organization",
            "mm_table" => "tx_hireme_ttcontent_organization_mm",
        ],
    ];


    public static function registerGeneralSourceFields(): void
    {
        /** @noinspection SpellCheckingInspection */
        ExtensionManagementUtility::addTCAcolumns('tt_content', [
            'tx_hireme_source_limit' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_source_limit'),
                'description' => Localization::forDescription('tx_hireme_source_limit'),
                'config' => [
                    'type' => 'number',
                    'default' => 4,
                    'nullable' => true,
                    'range' => [
                        'lower' => 1,
                    ],
                ],
            ],
            "tx_hireme_source_starting_points" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_source_starting_points"),
                "description" => Localization::forDescription("tx_hireme_source_starting_points"),
                "config" => [
                    "type" => "group",
                    "allowed" => "pages",
                    "size" => 5,
                    "maxitems" => 25,
                    "minitems" => 0,
                    "suggestOptions" => [
                        "default" => [
                            "additionalSearchFields" => "nav_title, url",
                        ],
                    ],
                ],
            ],
            "tx_hireme_source_include_starting_points" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_source_include_starting_points"),
                "description" => Localization::forDescription("tx_hireme_source_include_starting_points"),
                "config" => [
                    "type" => "check",
                    "renderType" => "checkboxToggle",
                    "default" => 1,
                ],
            ],
            "tx_hireme_source_depth" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_source_depth"),
                "description" => Localization::forDescription("tx_hireme_source_depth"),
                "config" => [
                    "type" => "select",
                    "renderType" => "selectSingle",
                    "items" => [
                        [
                            "label" =>  Localization::forLabel("tx_hireme_source_depth", Depth::ONLY_SELECTION->name),
                            "value" => Depth::ONLY_SELECTION->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_source_depth", Depth::LEVELS_1->name),
                            "value" => Depth::LEVELS_1->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_source_depth", Depth::LEVELS_2->name),
                            "value" => Depth::LEVELS_2->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_source_depth", Depth::LEVELS_3->name),
                            "value" => Depth::LEVELS_3->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_source_depth", Depth::LEVELS_4->name),
                            "value" => Depth::LEVELS_4->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_source_depth", Depth::INFINITE->name),
                            "value" => Depth::INFINITE->value,
                        ],
                    ],
                    "default" => Depth::INFINITE->value,
                ],
            ],
        ]);

        /** @noinspection SpellCheckingInspection */
        $GLOBALS["TCA"]["tt_content"]["palettes"]["source_general"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.source_general.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.source_general.description",
            "showitem" => "
                tx_hireme_source_limit,
                --linebreak--,
                tx_hireme_source_starting_points,
                --linebreak--,
                tx_hireme_source_include_starting_points,
                --linebreak--,
                tx_hireme_source_depth",
            ];
    }

    public static function registerCategoryFilterFields(): void
    {
        self::registerFilterFields("category");
    }

    public static function registerSysCategoryFilterFields(): void
    {
        /** @noinspection SpellCheckingInspection */
        self::registerFilterFields("syscategory");
    }

    public static function registerLocationFilterFields(): void
    {
        self::registerFilterFields("location");
    }

    public static function registerCountryFilterFields(): void
    {
        self::registerFilterFields("country");
    }

    public static function registerDepartmentFilterFields(): void
    {
        self::registerFilterFields("department");
    }

    public static function registerOrganizationFilterFields(): void
    {
        self::registerFilterFields("organization");
    }

    public static function registerPaginationFields(): void
    {
        /** @noinspection SpellCheckingInspection */
        ExtensionManagementUtility::addTCAcolumns('tt_content', [
            'tx_hireme_pagination_enabled' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_enabled'),
                'description' => Localization::forDescription('tx_hireme_pagination_enabled'),
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 1,
                ],
            ],
            'tx_hireme_pagination_position_top' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_position_top'),
                'description' => Localization::forDescription('tx_hireme_pagination_position_top'),
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 0,
                ],
            ],
            'tx_hireme_pagination_position_bottom' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_position_bottom'),
                'description' => Localization::forDescription('tx_hireme_pagination_position_bottom'),
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 1,
                ],
            ],
            'tx_hireme_pagination_show_dots' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_show_dots'),
                'description' => Localization::forDescription('tx_hireme_pagination_show_dots'),
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 1,
                ],
            ],
            'tx_hireme_pagination_max_links' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_max_links'),
                'description' => Localization::forDescription('tx_hireme_pagination_max_links'),
                'config' => [
                    'type' => 'number',
                    'default' => null,
                    'nullable' => true,
                ],
            ],
            'tx_hireme_pagination_items_per_page' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_items_per_page'),
                'description' => Localization::forDescription('tx_hireme_pagination_items_per_page'),
                'config' => [
                    'type' => 'number',
                    'default' => null,
                    'nullable' => true,
                    'range' => [
                        'lower' => 1,
                    ],
                ],
            ],
            'tx_hireme_pagination_show_prev_next' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_show_prev_next'),
                'description' => Localization::forDescription('tx_hireme_pagination_show_prev_next'),
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 1,
                ],
            ],
            'tx_hireme_pagination_show_first_last' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_show_first_last'),
                'description' => Localization::forDescription('tx_hireme_pagination_show_first_last'),
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 1,
                ],
            ],
            'tx_hireme_pagination_show_page_info' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_show_page_info'),
                'description' => Localization::forDescription('tx_hireme_pagination_show_page_info'),
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 1,
                ],
            ],
            'tx_hireme_pagination_show_item_info' => [
                'exclude' => true,
                'label' => Localization::forLabel('tx_hireme_pagination_show_item_info'),
                'description' => Localization::forDescription('tx_hireme_pagination_show_item_info'),
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'default' => 1,
                ],
            ],
        ]);

        /** @noinspection SpellCheckingInspection */
        $GLOBALS["TCA"]["tt_content"]["palettes"]["pagination"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.pagination.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.pagination.description",
            "showitem" => "
                tx_hireme_pagination_enabled,
                --linebreak--,
                tx_hireme_pagination_position_top,
                --linebreak--,
                tx_hireme_pagination_position_bottom,
                --linebreak--,
                tx_hireme_pagination_show_dots,
                --linebreak--,
                tx_hireme_pagination_max_links,
                --linebreak--,
                tx_hireme_pagination_items_per_page,
                --linebreak--,
                tx_hireme_pagination_show_prev_next,
                --linebreak--,
                tx_hireme_pagination_show_first_last,
                --linebreak--,
                tx_hireme_pagination_show_page_info,
                --linebreak--,
                tx_hireme_pagination_show_item_info",
        ];
    }


    private static function registerFilterFields(string $filterType): void {

        /** @noinspection SpellCheckingInspection */
        ExtensionManagementUtility::addTCAcolumns("tt_content", [
            "tx_hireme_filter_{$filterType}_enabled" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_filter_{$filterType}_enabled"),
                "description" => Localization::forDescription("tx_hireme_filter_{$filterType}_enabled"),
                "onChange" => "reload",
                "config" => [
                    "type" => "check",
                    "renderType" => "checkboxToggle",
                    "default" => 0,
                ],
            ],
            "tx_hireme_filter_{$filterType}_type" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_filter_{$filterType}_type"),
                "description" => Localization::forDescription("tx_hireme_filter_{$filterType}_type"),
                "onChange" => "reload",
                "displayCond" => [
                    "AND" => [
                        "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                    ],
                ],
                "config" => [
                    "type" => "select",
                    "renderType" => "selectSingle",
                    "items" => [
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_type", Generation::GENERATED->name),
                            "value" => Generation::GENERATED->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_type", Generation::MANUALLY->name),
                            "value" => Generation::MANUALLY->value,
                        ],
                    ],
                    "default" => Generation::GENERATED->value,
                ],
            ],
            "tx_hireme_filter_{$filterType}_items" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_filter_{$filterType}_items"),
                "description" => Localization::forDescription("tx_hireme_filter_{$filterType}_items"),
                "displayCond" => [
                    "AND" => [
                        "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                        "FIELD:tx_hireme_filter_{$filterType}_type:=:" . Generation::MANUALLY->value,
                    ],
                ],
                "config" => [
                    "type" => "select",
                    "renderType" => "selectMultipleSideBySide",
                    "foreign_table" => self::FIELD_MAPPING[$filterType]['foreign_table'],
                    "MM" => self::FIELD_MAPPING[$filterType]['mm_table'],
                ],
            ],
            "tx_hireme_filter_{$filterType}_starting_points" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_filter_{$filterType}_starting_points"),
                "description" => Localization::forDescription("tx_hireme_filter_{$filterType}_starting_points"),
                "displayCond" => [
                    "AND" => [
                        "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                        "FIELD:tx_hireme_filter_{$filterType}_type:=:" . Generation::GENERATED->value,
                    ],
                ],
                "config" => [
                    "type" => "group",
                    "allowed" => "pages",
                    "size" => 5,
                    "maxitems" => 25,
                    "minitems" => 0,
                    "suggestOptions" => [
                        "default" => [
                            "additionalSearchFields" => "nav_title, url",
                        ],
                    ],
                ],
            ],
            "tx_hireme_filter_{$filterType}_condition" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_filter_{$filterType}_condition"),
                "description" => Localization::forDescription("tx_hireme_filter_{$filterType}_condition"),
                "displayCond" => [
                    "AND" => [
                        "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                        "FIELD:tx_hireme_filter_{$filterType}_type:=:" . Generation::GENERATED->value,
                    ],
                ],
                "config" => [
                    "type" => "select",
                    "renderType" => "selectSingle",
                    "default" => Condition::OR->value,
                    "items" => [
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_condition", Condition::OR->name),
                            "value" => Condition::OR->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_condition", Condition::AND->name),
                            "value" => Condition::AND->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_condition", Condition::NOR->name),
                            "value" => Condition::NOR->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_condition", Condition::NAND->name),
                            "value" => Condition::NAND->value,
                        ],
                    ],
                ],
            ],
            "tx_hireme_filter_{$filterType}_include_starting_points" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_filter_{$filterType}_include_starting_points"),
                "description" => Localization::forDescription("tx_hireme_filter_{$filterType}_include_starting_points"),
                "displayCond" => [
                    "AND" => [
                        "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                        "FIELD:tx_hireme_filter_{$filterType}_type:=:" . Generation::GENERATED->value,
                    ],
                ],
                "config" => [
                    "type" => "check",
                    "renderType" => "checkboxToggle",
                    "default" => 1,
                ],
            ],
            "tx_hireme_filter_{$filterType}_depth" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_filter_{$filterType}_depth"),
                "description" => Localization::forDescription("tx_hireme_filter_{$filterType}_depth"),
                "displayCond" => [
                    "AND" => [
                        "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                        "FIELD:tx_hireme_filter_{$filterType}_type:=:" . Generation::GENERATED->value,
                    ],
                ],
                "config" => [
                    "type" => "select",
                    "renderType" => "selectSingle",
                    "items" => [
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_depth", Depth::ONLY_SELECTION->name),
                            "value" => Depth::ONLY_SELECTION->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_depth", Depth::LEVELS_1->name),
                            "value" => Depth::LEVELS_1->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_depth", Depth::LEVELS_2->name),
                            "value" => Depth::LEVELS_2->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_depth", Depth::LEVELS_3->name),
                            "value" => Depth::LEVELS_3->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_depth", Depth::LEVELS_4->name),
                            "value" => Depth::LEVELS_4->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("tx_hireme_filter_{$filterType}_depth", Depth::INFINITE->name),
                            "value" => Depth::INFINITE->value,
                        ],
                    ],
                    "default" => Depth::INFINITE->value,
                ],
            ],
            "tx_hireme_filter_{$filterType}_order_by" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_filter_{$filterType}_order_by"),
                "description" => Localization::forDescription("tx_hireme_filter_{$filterType}_order_by"),
                "displayCond" => [
                    "AND" => [
                        "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                        "FIELD:tx_hireme_filter_{$filterType}_type:=:" . Generation::GENERATED->value,
                    ],
                ],
                "config" => [
                    "type" => "select",
                    "renderType" => "selectSingle",
                    "items" => [],
                    "default" => null,
                ],
            ],
        ]);

        /** @noinspection SpellCheckingInspection */
        $GLOBALS["TCA"]["tt_content"]["palettes"]["filter_$filterType"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$filterType.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$filterType.description",
            "showitem" => "
                tx_hireme_filter_{$filterType}_enabled,
                --linebreak--,
                tx_hireme_filter_{$filterType}_type,
                --linebreak--,
                tx_hireme_filter_{$filterType}_items,
                --linebreak--,
                tx_hireme_filter_{$filterType}_starting_points,
                --linebreak--,
                tx_hireme_filter_{$filterType}_condition,
                --linebreak--,
                tx_hireme_filter_{$filterType}_include_starting_points,
                --linebreak--,
                tx_hireme_filter_{$filterType}_depth,
                --linebreak--,
                tx_hireme_filter_{$filterType}_order_by",
        ];
    }



    public static function registerSourceFields(string $sourceType): void {

        /** @noinspection SpellCheckingInspection */
        ExtensionManagementUtility::addTCAcolumns('tt_content', [


            "tx_hireme_source_{$sourceType}_items" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_source_{$sourceType}_items"),
                "description" => Localization::forDescription("tx_hireme_source_{$sourceType}_items"),
                "config" => [
                    "type" => "select",
                    "renderType" => "selectMultipleSideBySide",
                    "foreign_table" => self::FIELD_MAPPING[$sourceType]['foreign_table'],
                    "MM" => self::FIELD_MAPPING[$sourceType]['mm_table'],
                ],
            ],
            "tx_hireme_source_{$sourceType}_condition" => [
                "exclude" => true,
                "label" => Localization::forLabel("condition"),
                "description" => Localization::forDescription("condition"),
                "config" => [
                    "type" => "select",
                    "renderType" => "selectSingle",
                    "default" => Condition::OR->value,
                    "items" => [
                        [
                            "label" =>  Localization::forLabel("condition", Condition::OR->name),
                            "value" => Condition::OR->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("condition", Condition::AND->name),
                            "value" => Condition::AND->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("condition", Condition::NOR->name),
                            "value" => Condition::NOR->value,
                        ],
                        [
                            "label" =>  Localization::forLabel("condition", Condition::NAND->name),
                            "value" => Condition::NAND->value,
                        ],
                    ],
                ],
            ]
        ]);


        /** @noinspection SpellCheckingInspection */
        $GLOBALS["TCA"]["tt_content"]["palettes"]["source_$sourceType"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$sourceType.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$sourceType.description",
            "showitem" => "
            tx_hireme_source_{$sourceType}_items,
            --linebreak--,
            tx_hireme_source_{$sourceType}_condition",
        ];
    }
}
