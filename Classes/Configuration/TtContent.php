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

use ChristianDorka\HireMe\Enum\Operator;
use ChristianDorka\HireMe\Enum\Depth;
use ChristianDorka\HireMe\Enum\Generation;
use ChristianDorka\HireMe\Enum\Job\CareerLevel;
use ChristianDorka\HireMe\Enum\Job\EmploymentType;
use ChristianDorka\HireMe\Helper\FieldHelper;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

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
        "scope" => [
            "foreign_table" => "tx_hireme_scope",
            "mm_table" => "tx_hireme_ttcontent_scope_mm",
        ],
    ];


    /**
     * @return void
     * @noinspection SpellCheckingInspection
     */
    public static function registerGeneralFilterFields(): void
    {
        ExtensionManagementUtility::addTCAcolumns('tt_content', [
            'tx_hireme_filter_enabled' => FieldHelper::createToggleField('tx_hireme_filter_enabled', 1, reloadOnChange: true),
        ]);

        $GLOBALS["TCA"]["tt_content"]["palettes"]["filter_general"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_general.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_general.description",
            "showitem" => "tx_hireme_filter_enabled",
        ];
    }

    public static function registerGeneralSourceFields(): void
    {
        /** @noinspection SpellCheckingInspection */
        ExtensionManagementUtility::addTCAcolumns('tt_content', [
            'tx_hireme_source_limit' => FieldHelper::createNumberField('tx_hireme_source_limit', 4, true, 1),
            'tx_hireme_source_starting_points' => FieldHelper::createPagesField('tx_hireme_source_starting_points'),
            'tx_hireme_source_include_starting_points' => FieldHelper::createToggleField('tx_hireme_source_include_starting_points', 1),
            'tx_hireme_source_depth' => FieldHelper::createDepthField('tx_hireme_source_depth'),
        ]);

        /** @noinspection SpellCheckingInspection */
        $GLOBALS["TCA"]["tt_content"]["palettes"]["source_general"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.source_general.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.source_general.description",
            "showitem" => "
                tx_hireme_source_limit,--linebreak--,
                tx_hireme_source_starting_points,--linebreak--,
                tx_hireme_source_include_starting_points,--linebreak--,
                tx_hireme_source_depth",
        ];
    }


    public static function registerPaginationFields(): void
    {
        /** @noinspection SpellCheckingInspection */
        ExtensionManagementUtility::addTCAcolumns('tt_content', [
            'tx_hireme_pagination_enabled' => FieldHelper::createToggleField('tx_hireme_pagination_enabled', 1),
            'tx_hireme_pagination_position_top' => FieldHelper::createToggleField('tx_hireme_pagination_position_top'),
            'tx_hireme_pagination_position_bottom' => FieldHelper::createToggleField('tx_hireme_pagination_position_bottom'),
            'tx_hireme_pagination_show_dots' => FieldHelper::createToggleField('tx_hireme_pagination_show_dots'),
            'tx_hireme_pagination_max_links' => FieldHelper::createNumberField('tx_hireme_pagination_max_links'),
            'tx_hireme_pagination_items_per_page' => FieldHelper::createNumberField('tx_hireme_pagination_items_per_page', null, true, 1),
            'tx_hireme_pagination_show_prev_next' => FieldHelper::createToggleField('tx_hireme_pagination_show_prev_next', 1),
            'tx_hireme_pagination_show_first_last' => FieldHelper::createToggleField('tx_hireme_pagination_show_first_last', 1),
            'tx_hireme_pagination_show_page_info' => FieldHelper::createToggleField('tx_hireme_pagination_show_page_info', 1),
            'tx_hireme_pagination_show_item_info' => FieldHelper::createToggleField('tx_hireme_pagination_show_item_info', 1),
        ]);

        /** @noinspection SpellCheckingInspection */
        $GLOBALS["TCA"]["tt_content"]["palettes"]["pagination"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.pagination.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.pagination.description",
            "showitem" => "
                tx_hireme_pagination_enabled,--linebreak--,
                tx_hireme_pagination_position_top,--linebreak--,
                tx_hireme_pagination_position_bottom,--linebreak--,
                tx_hireme_pagination_show_dots,--linebreak--,
                tx_hireme_pagination_max_links,--linebreak--,
                tx_hireme_pagination_items_per_page,--linebreak--,
                tx_hireme_pagination_show_prev_next,--linebreak--,
                tx_hireme_pagination_show_first_last,--linebreak--,
                tx_hireme_pagination_show_page_info,--linebreak--,
                tx_hireme_pagination_show_item_info",
        ];
    }


    public static function registerIntArrayFilterFields(string $filterType, array $items = []): void
    {
        /** @noinspection SpellCheckingInspection */
        ExtensionManagementUtility::addTCAcolumns("tt_content", [
            "tx_hireme_filter_{$filterType}_types" => [
                'exclude' => true,
                'label' => Localization::forLabel("tx_hireme_filter_{$filterType}_types"),
                'description' => Localization::forDescription("tx_hireme_filter_{$filterType}_types"),
                "displayCond" => [
                    "AND" => [
                        "FIELD:tx_hireme_filter_enabled:=:1",
                    ],
                ],
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectMultipleSideBySide',
                    'items' => $items
                ],
            ],
        ]);

        /** @noinspection SpellCheckingInspection */
        $GLOBALS["TCA"]["tt_content"]["palettes"]["filter_$filterType"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$filterType.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$filterType.description",
            "showitem" => "
               tx_hireme_filter_{$filterType}_types",
        ];
    }

    public static function registerFilterFields(string $filterType): void
    {
        $manualFieldCondition = [
            "AND" => [
                "FIELD:tx_hireme_filter_enabled:=:1",
                "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                "FIELD:tx_hireme_filter_{$filterType}_type:=:" . Generation::MANUALLY->value,
            ],
        ];
        $generatedFieldCondition = [
            "AND" => [
                "FIELD:tx_hireme_filter_enabled:=:1",
                "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                "FIELD:tx_hireme_filter_{$filterType}_type:=:" . Generation::GENERATED->value,
            ],
        ];

        /** @noinspection SpellCheckingInspection */
        ExtensionManagementUtility::addTCAcolumns("tt_content", [
            "tx_hireme_filter_{$filterType}_enabled" => [
                "exclude" => true,
                "label" => Localization::forLabel("tx_hireme_filter_{$filterType}_enabled"),
                "description" => Localization::forDescription("tx_hireme_filter_{$filterType}_enabled"),
                "onChange" => "reload",
                "displayCond" => [
                    "AND" => [
                        "FIELD:tx_hireme_filter_enabled:=:1",
                    ],
                ],
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
                        "FIELD:tx_hireme_filter_enabled:=:1",
                        "FIELD:tx_hireme_filter_{$filterType}_enabled:=:1",
                    ],
                ],
                "config" => [
                    "type" => "select",
                    "renderType" => "selectSingle",
                    "items" => [
                        [
                            "label" => Localization::forLabel(
                                "tx_hireme_filter_{$filterType}_type",
                                Generation::GENERATED->name
                            ),
                            "value" => Generation::GENERATED->value,
                        ],
                        [
                            "label" => Localization::forLabel(
                                "tx_hireme_filter_{$filterType}_type",
                                Generation::MANUALLY->name
                            ),
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
                "displayCond" => $manualFieldCondition,
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
                "displayCond" => $generatedFieldCondition,
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
            // Not needed?
            // "tx_hireme_filter_{$filterType}_operator" => FieldHelper::createOperatorField("tx_hireme_filter_{$filterType}_operator", displayCond: $generatedFieldCondition),
            "tx_hireme_filter_{$filterType}_include_starting_points" => FieldHelper::createToggleField("tx_hireme_filter_{$filterType}_include_starting_points", 1,  displayCond: $generatedFieldCondition),
            "tx_hireme_filter_{$filterType}_depth" => FieldHelper::createDepthField("tx_hireme_filter_{$filterType}_depth", displayCond: $generatedFieldCondition),
            "tx_hireme_filter_{$filterType}_order_by" => FieldHelper::createGeneratedOrderByField("tx_hireme_filter_{$filterType}_order_by", displayCond: $generatedFieldCondition),
            "tx_hireme_filter_{$filterType}_order_direction" => FieldHelper::createOrderDirectionField("tx_hireme_filter_{$filterType}_order_direction", displayCond: $generatedFieldCondition),
        ]);

        /** @noinspection SpellCheckingInspection */
        $GLOBALS["TCA"]["tt_content"]["palettes"]["filter_$filterType"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$filterType.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$filterType.description",
            "showitem" => "
                tx_hireme_filter_{$filterType}_enabled,--linebreak--,
                tx_hireme_filter_{$filterType}_type,--linebreak--,
                tx_hireme_filter_{$filterType}_items,--linebreak--,
                tx_hireme_filter_{$filterType}_starting_points,--linebreak--,
                tx_hireme_filter_{$filterType}_include_starting_points,--linebreak--,
                tx_hireme_filter_{$filterType}_depth,--linebreak--,
                tx_hireme_filter_{$filterType}_order_by,--linebreak--,
                tx_hireme_filter_{$filterType}_order_direction",
        ];
    }


    /**
     * TODO
     *
     * @param string $sourceType
     *
     * @return void
     * @noinspection SpellCheckingInspection
     */
    public static function registerSourceFields(string $sourceType): void
    {
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
            "tx_hireme_source_{$sourceType}_operator" => FieldHelper::createOperatorField("operator"),
        ]);

        $GLOBALS["TCA"]["tt_content"]["palettes"]["source_$sourceType"] = [
            "label" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$sourceType.label",
            "description" => "LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:palette.filter_$sourceType.description",
            "showitem" => "
                tx_hireme_source_{$sourceType}_items,--linebreak--,
                tx_hireme_source_{$sourceType}_operator",
        ];
    }
}
