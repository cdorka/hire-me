<?php
declare(strict_types=1);

use ChristianDorka\HireMe\Configuration\Localization;
use ChristianDorka\HireMe\Enum\FilterOptionGenerationTypeEnum;
use ChristianDorka\HireMe\Enum\LogicalOperatorEnum;
use ChristianDorka\HireMe\Enum\PaginationPositionEnum;
use ChristianDorka\HireMe\Enum\PaginationTypeEnum;
use ChristianDorka\HireMe\Enum\StartingPointDepth;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$languageFile = 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:';


/** @noinspection SpellCheckingInspection */
$jobPostingDetailsSignature = ExtensionUtility::registerPlugin(
    'hire_me',
    'JobPostingDetails',
    $languageFile . 'tt_content.hireme_jobpostingdetails.title',
    'TODO',
    'hire_me',
    $languageFile . 'tt_content.hireme_jobpostingdetails.description',
);
if (!isset($GLOBALS['TCA']['tt_content']['types'][$jobPostingDetailsSignature])) {
    $GLOBALS['TCA']['tt_content']['types'][$jobPostingDetailsSignature] = $GLOBALS['TCA']['tt_content']['types']['list'];
}


/** @noinspection SpellCheckingInspection */
$jobPostingListSignature = ExtensionUtility::registerPlugin(
    'hire_me',
    'JobPostingList',
    $languageFile . 'tt_content.hireme_jobpostinglist.title',
    'TODO',
    'hire_me',
    $languageFile . 'tt_content.hireme_jobpostinglist.description',
);
if (!isset($GLOBALS['TCA']['tt_content']['types'][$jobPostingListSignature])) {
    $GLOBALS['TCA']['tt_content']['types'][$jobPostingListSignature] = $GLOBALS['TCA']['tt_content']['types']['list'];
}


/** @noinspection SpellCheckingInspection */
$jobPostingLatestSignature = ExtensionUtility::registerPlugin(
    'hire_me',
    'JobPostingLatest',
    $languageFile . 'tt_content.hireme_jobpostinglatest.title',
    'TODO',
    'hire_me',
    $languageFile . 'tt_content.hireme_jobpostinglatest.description',
);
if (!isset($GLOBALS['TCA']['tt_content']['types'][$jobPostingLatestSignature])) {
    $GLOBALS['TCA']['tt_content']['types'][$jobPostingLatestSignature] = $GLOBALS['TCA']['tt_content']['types']['list'];
}


/** @noinspection SpellCheckingInspection */
$jobPostingSearchSignature = ExtensionUtility::registerPlugin(
    'hire_me',
    'JobPostingSearch',
    $languageFile . 'tt_content.hireme_jobpostingsearch.title',
    'TODO',
    'hire_me',
    $languageFile . 'tt_content.hireme_jobpostingsearch.description',
);
if (!isset($GLOBALS['TCA']['tt_content']['types'][$jobPostingSearchSignature])) {
    $GLOBALS['TCA']['tt_content']['types'][$jobPostingSearchSignature] = $GLOBALS['TCA']['tt_content']['types']['list'];
}


//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/** @noinspection SpellCheckingInspection */
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_hireme_header' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_header'),
        'description' => Localization::forDescription('tx_hireme_header'),
        'config' => [
            'type' => 'text',
            'enableRichtext' => true,
        ],
    ],
    'tx_hireme_text' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_text'),
        'description' => Localization::forDescription('tx_hireme_text'),
        'config' => [
            'type' => 'text',
            'enableRichtext' => true,
        ],
    ],
    'tx_hireme_detail_page' => [
        'exclude' => false,
        'label' => Localization::forLabel('tx_hireme_detail_page'),
        'description' => Localization::forDescription('tx_hireme_detail_page'),
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'pages',
            'size' => 1,
            'maxitems' => 1,
            'minitems' => 0,
            'default' => null,
            'suggestOptions' => [
                'default' => [
                    'searchWholePhrase' => true,
                ],
            ],
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
            'eval' => 'int,null',
            'fieldControl' => [
                'elementBrowser' => [
                    'disabled' => false,
                ],
            ],
        ],
    ],
    'tx_hireme_fallback_page' => [
        'exclude' => false,
        'label' => Localization::forLabel('tx_hireme_fallback_page'),
        'description' => Localization::forDescription('tx_hireme_fallback_page'),
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'pages',
            'size' => 1,
            'maxitems' => 1,
            'minitems' => 0,
            'default' => null,
            'suggestOptions' => [
                'default' => [
                    'searchWholePhrase' => true,
                ],
            ],
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
            'eval' => 'int,null',
            'fieldControl' => [
                'elementBrowser' => [
                    'disabled' => false,
                ],
            ],
        ],
    ],
    'tx_hireme_btn_overview_link' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_btn_overview_link'),
        'description' => Localization::forDescription('tx_hireme_btn_overview_link'),
        'config' => [
            'type' => 'link',
        ],
    ],
    'tx_hireme_btn_overview_text' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_btn_overview_text'),
        'description' => Localization::forDescription('tx_hireme_btn_overview_text'),
        'config' => [
            'type' => 'text',
            'rows' => 2,
        ],
    ],

    // Display options
    'tx_hireme_hide_newtime' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_newtime'),
        'description' => Localization::forDescription('tx_hireme_hide_newtime'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_toptime' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_toptime'),
        'description' => Localization::forDescription('tx_hireme_hide_toptime'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_map' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_map'),
        'description' => Localization::forDescription('tx_hireme_hide_map'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_search' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_search'),
        'description' => Localization::forDescription('tx_hireme_hide_search'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_orderby' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_orderby'),
        'description' => Localization::forDescription('tx_hireme_hide_orderby'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_filter' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_filter'),
        'description' => Localization::forDescription('tx_hireme_hide_filter'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_valid_through' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_valid_through'),
        'description' => Localization::forDescription('tx_hireme_hide_valid_through'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_job_start_date' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_job_start_date'),
        'description' => Localization::forDescription('tx_hireme_hide_job_start_date'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_location' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_location'),
        'description' => Localization::forDescription('tx_hireme_hide_location'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_companies' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_hide_companies'),
        'description' => Localization::forDescription('tx_hireme_hide_companies'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_results_limit' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_results_limit'),
        'description' => Localization::forDescription('tx_hireme_results_limit'),
        'config' => [
            'type' => 'number',
            'default' => 4,
            'nullable' => true,
            'range' => [
                'lower' => 1,
            ],
        ],
    ],
    'tx_hireme_show_direct_apply_link' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_show_direct_apply_link'),
        'description' => Localization::forDescription('tx_hireme_show_direct_apply_link'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_date_format' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_date_format'),
        'description' => Localization::forDescription('tx_hireme_date_format'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'FULL_DATE'),
                    'value' => 0,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'SHORT_WEEK_DAY_BEFORE_FULL_DATE'),
                    'value' => 1,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'SHORT_DATE'),
                    'value' => 2,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'FULL_DATE_WITH_TIME'),
                    'value' => 3,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'FULL_DATE_WITH_FULL_TIME'),
                    'value' => 4,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'FULL_WEEKDAY_WITH_DATE'),
                    'value' => 5,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'MONTH_YEAR'),
                    'value' => 6,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'WEEK_NUMBER'),
                    'value' => 7,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'TIME_ONLY'),
                    'value' => 8,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'FULL_TIME_ONLY'),
                    'value' => 9,
                ],
                [
                    'label' =>  Localization::forLabel('tx_hireme_date_format', item: 'ISO_8601_DATETIME'),
                    'value' => 10,
                ],
            ],
            'default' => \ChristianDorka\HireMe\Enum\DateFormat::FULL_DATE->value,
        ],
    ],


    'tx_hireme_filter_employment_types' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_employment_types'),
        'description' => Localization::forDescription('tx_hireme_filter_employment_types'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'items' => \ChristianDorka\HireMe\Enum\Job\EmploymentType::getTcaItems()
        ],
    ],
    'tx_hireme_filter_career_levels' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_career_levels'),
        'description' => Localization::forDescription('tx_hireme_filter_career_levels'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'items' => \ChristianDorka\HireMe\Enum\Job\CareerLevel::getTcaItems()
        ],
    ],
    'tx_hireme_filter_scopes' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_scopes'),
        'description' => Localization::forDescription('tx_hireme_filter_scopes'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_scope',
            'multiple' => false,
            'foreign_table_where' => 'AND {#tx_hireme_scope}.{#sys_language_uid} IN (-1,0)',
            'MM' => 'tx_hireme_ttcontent_scope_mm',
            'minitems' => 0,
            'maxitems' => 9999,
            'fieldControl' => [
                'editPopup' => [
                    'disabled' => true,
                ],
                'addRecord' => [
                    'disabled' => true,
                ],
                'listModule' => [
                    'disabled' => true,
                ],
            ],
        ],
    ],

]);


// Add some fields to fe_users table to show TCA fields definitions

/** @noinspection SpellCheckingInspection */
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_hireme_source_starting_points' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_starting_points'),
        'description' => Localization::forDescription('tx_hireme_source_starting_points'),
        'config' => [
            'type' => 'group',
            'allowed' => 'pages',
            'size' => 5,
            'maxitems' => 25,
            'minitems' => 0,
            'suggestOptions' => [
                'default' => [
                    'additionalSearchFields' => 'nav_title, url',
                ],
            ],
        ],
    ],
    'tx_hireme_source_include_selected_starting_point' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_include_selected_starting_point'),
        'description' => Localization::forDescription('tx_hireme_source_include_selected_starting_point'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_source_starting_point_depth' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_starting_point_depth'),
        'description' => Localization::forDescription('tx_hireme_source_starting_point_depth'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_source_categories' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_categories'),
        'description' => Localization::forDescription('tx_hireme_source_categories'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_category',
            'MM' => 'tx_cpblog_ttcontent_category_mm',
        ],
    ],
    'tx_hireme_source_categories_logical_operator' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_categories_logical_operator'),
        'description' => Localization::forDescription('tx_hireme_source_categories_logical_operator'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
    'tx_hireme_source_country' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_country'),
        'description' => Localization::forDescription('tx_hireme_source_country'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_country',
            'MM' => 'tx_cpblog_ttcontent_country_mm',
        ],
    ],
    'tx_hireme_source_country_logical_operator' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_country_logical_operator'),
        'description' => Localization::forDescription('tx_hireme_source_country_logical_operator'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
    'tx_hireme_source_location' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_location'),
        'description' => Localization::forDescription('tx_hireme_source_location'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_location',
            'MM' => 'tx_cpblog_ttcontent_location_mm',
        ],
    ],
    'tx_hireme_source_location_logical_operator' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_location_logical_operator'),
        'description' => Localization::forDescription('tx_hireme_source_location_logical_operator'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
    'tx_hireme_source_department' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_department'),
        'description' => Localization::forDescription('tx_hireme_source_department'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_department',
            'MM' => 'tx_cpblog_ttcontent_department_mm',
        ],
    ],
    'tx_hireme_source_department_logical_operator' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_department_logical_operator'),
        'description' => Localization::forDescription('tx_hireme_source_department_logical_operator'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
    'tx_hireme_source_organization' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_organization'),
        'description' => Localization::forDescription('tx_hireme_source_organization'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_organization',
            'MM' => 'tx_cpblog_ttcontent_organization_mm',
        ],
    ],
    'tx_hireme_source_organization_logical_operator' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_organization_logical_operator'),
        'description' => Localization::forDescription('tx_hireme_source_organization_logical_operator'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
]);




/** @noinspection SpellCheckingInspection */
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_hireme_source_starting_points' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_source_starting_points'),
        'description' => Localization::forDescription('tx_hireme_source_starting_points'),
        'config' => [
            'type' => 'group',
            'allowed' => 'pages',
            'size' => 5,
            'maxitems' => 25,
            'minitems' => 0,
            'suggestOptions' => [
                'default' => [
                    'additionalSearchFields' => 'nav_title, url',
                ],
            ],
        ],
    ],
    'tx_hireme_filter_show_text' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_show_text'),
        'description' => Localization::forDescription('tx_hireme_filter_show_text'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_show_category' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_show_category'),
        'description' => Localization::forDescription('tx_hireme_filter_show_category'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_category_type' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_category_type'),
        'description' => Localization::forDescription('tx_hireme_filter_category_type'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_categories' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_categories'),
        'description' => Localization::forDescription('tx_hireme_filter_categories'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_category',
            'MM' => 'tx_cpblog_ttcontent_category_mm',
        ],
    ],

'tx_hireme_filter_category_starting_points' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_category_starting_points'),
        'description' => Localization::forDescription('tx_hireme_filter_category_starting_points'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_category_include_selected_starting_point' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_category_include_selected_starting_point'),
        'description' => Localization::forDescription('tx_hireme_filter_category_include_selected_starting_point'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_category_starting_point_depth' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_category_starting_point_depth'),
        'description' => Localization::forDescription('tx_hireme_filter_category_starting_point_depth'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_filter_show_location' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_show_location'),
        'description' => Localization::forDescription('tx_hireme_filter_show_location'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_location_type' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_location_type'),
        'description' => Localization::forDescription('tx_hireme_filter_location_type'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_locations' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_locations'),
        'description' => Localization::forDescription('tx_hireme_filter_locations'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_location',
            'MM' => 'tx_cpblog_ttcontent_location_mm',
        ],
    ],

'tx_hireme_filter_location_starting_points' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_location_starting_points'),
        'description' => Localization::forDescription('tx_hireme_filter_location_starting_points'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_location_include_selected_starting_point' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_location_include_selected_starting_point'),
        'description' => Localization::forDescription('tx_hireme_filter_location_include_selected_starting_point'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_location_starting_point_depth' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_location_starting_point_depth'),
        'description' => Localization::forDescription('tx_hireme_filter_location_starting_point_depth'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_filter_show_country' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_show_country'),
        'description' => Localization::forDescription('tx_hireme_filter_show_country'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_country_type' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_country_type'),
        'description' => Localization::forDescription('tx_hireme_filter_country_type'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_countries' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_countries'),
        'description' => Localization::forDescription('tx_hireme_filter_countries'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_country',
            'MM' => 'tx_cpblog_ttcontent_country_mm',
        ],
    ],

'tx_hireme_filter_country_starting_points' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_country_starting_points'),
        'description' => Localization::forDescription('tx_hireme_filter_country_starting_points'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_country_include_selected_starting_point' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_country_include_selected_starting_point'),
        'description' => Localization::forDescription('tx_hireme_filter_country_include_selected_starting_point'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_country_starting_point_depth' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_country_starting_point_depth'),
        'description' => Localization::forDescription('tx_hireme_filter_country_starting_point_depth'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_filter_show_department' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_show_department'),
        'description' => Localization::forDescription('tx_hireme_filter_show_department'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_department_type' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_department_type'),
        'description' => Localization::forDescription('tx_hireme_filter_department_type'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_departments' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_departments'),
        'description' => Localization::forDescription('tx_hireme_filter_departments'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_department',
            'MM' => 'tx_cpblog_ttcontent_department_mm',
        ],
    ],

'tx_hireme_filter_department_starting_points' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_department_starting_points'),
        'description' => Localization::forDescription('tx_hireme_filter_department_starting_points'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_department_include_selected_starting_point' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_department_include_selected_starting_point'),
        'description' => Localization::forDescription('tx_hireme_filter_department_include_selected_starting_point'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_department_starting_point_depth' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_department_starting_point_depth'),
        'description' => Localization::forDescription('tx_hireme_filter_department_starting_point_depth'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_filter_show_organization' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_show_organization'),
        'description' => Localization::forDescription('tx_hireme_filter_show_organization'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_organization_type' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_organization_type'),
        'description' => Localization::forDescription('tx_hireme_filter_organization_type'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_organizations' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_organizations'),
        'description' => Localization::forDescription('tx_hireme_filter_organizations'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_organization',
            'MM' => 'tx_cpblog_ttcontent_organization_mm',
        ],
    ],

'tx_hireme_filter_organization_starting_points' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_organization_starting_points'),
        'description' => Localization::forDescription('tx_hireme_filter_organization_starting_points'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_organization_include_selected_starting_point' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_organization_include_selected_starting_point'),
        'description' => Localization::forDescription('tx_hireme_filter_organization_include_selected_starting_point'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_organization_starting_point_depth' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_filter_organization_starting_point_depth'),
        'description' => Localization::forDescription('tx_hireme_filter_organization_starting_point_depth'),
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
]);


/** @noinspection SpellCheckingInspection */
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_hireme_display_show_number_of_results' => [
        'exclude' => true,
        'label' => Localization::forLabel('tx_hireme_display_show_number_of_results,'),
        'description' => Localization::forDescription('tx_hireme_display_show_number_of_results,'),
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
]);

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
]);


/** @noinspection SpellCheckingInspection */
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '
            --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tabs.display_config,
                -- tx_hireme_display_starting_points,
                tx_hireme_display_show_number_of_results,
                tx_hireme_display_table_fields,
                tx_hireme_display_table_order_change,


            --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tabs.source_config,
                tx_hireme_source_starting_points,
                tx_hireme_source_include_selected_starting_point,
                tx_hireme_source_starting_point_depth,
                tx_hireme_source_categories,
                tx_hireme_source_categories_logical_operator,
                tx_hireme_source_country,
                tx_hireme_source_country_logical_operator,
                tx_hireme_source_location,
                tx_hireme_source_location_logical_operator,
                tx_hireme_source_department,
                tx_hireme_source_department_logical_operator,
                tx_hireme_source_organization,
                tx_hireme_source_organization_logical_operator,

            --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tabs.filter_config,
                -- tx_hireme_filter_publication_date???_range,
                tx_hireme_filter_show_text,
                tx_hireme_filter_show_category,
                tx_hireme_filter_categories,
                tx_hireme_filter_category_type,
                tx_hireme_filter_category_starting_points,
                tx_hireme_filter_category_include_selected_starting_point,
                tx_hireme_filter_category_starting_point_depth,
                tx_hireme_filter_show_location,
                tx_hireme_filter_locations,
                tx_hireme_filter_location_type,
                tx_hireme_filter_location_starting_points,
                tx_hireme_filter_location_include_selected_starting_point,
                tx_hireme_filter_location_starting_point_depth,
                tx_hireme_filter_show_country,
                tx_hireme_filter_countries,
                tx_hireme_filter_country_type,
                tx_hireme_filter_country_starting_points,
                tx_hireme_filter_country_include_selected_starting_point,
                tx_hireme_filter_country_starting_point_depth,
                tx_hireme_filter_show_department,
                tx_hireme_filter_departments,
                tx_hireme_filter_department_type,
                tx_hireme_filter_department_starting_points,
                tx_hireme_filter_department_include_selected_starting_point,
                tx_hireme_filter_department_starting_point_depth,
                tx_hireme_filter_show_organization,
                tx_hireme_filter_organizations,
                tx_hireme_filter_organization_type,
                tx_hireme_filter_organization_starting_points,
                tx_hireme_filter_organization_include_selected_starting_point,
                tx_hireme_filter_organization_starting_point_depth,
            --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tabs.pagination_config,
                tx_hireme_pagination_enabled,
                tx_hireme_pagination_position_top,
                tx_hireme_pagination_position_bottom,
                tx_hireme_pagination_show_dots,
                tx_hireme_pagination_max_links,
                tx_hireme_pagination_items_per_page,
                tx_hireme_pagination_show_prev_next,
                tx_hireme_pagination_show_first_last,
        ',
    'hireme_jobpostinglatest',
    'after:subheader',
);






/** @noinspection SpellCheckingInspection */
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'tx_hireme_header,
        tx_hireme_text,
        tx_hireme_date_format,
        tx_hireme_detail_page,
        tx_hireme_results_limit,
        tx_hireme_hide_newtime,
        tx_hireme_hide_toptime,
        tx_hireme_hide_filter,
        tx_hireme_hide_valid_through,
        tx_hireme_hide_job_start_date,
        tx_hireme_hide_location,
        tx_hireme_hide_companies,

        tx_hireme_btn_overview_link,
        tx_hireme_btn_overview_text,',
    'hireme_jobpostinglatest',
    'after:subheader',
);


ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'tx_hireme_header,
        tx_hireme_text,

        tx_hireme_filter_employment_types,
        tx_hireme_filter_career_levels,
        tx_hireme_filter_scopes,

        tx_hireme_date_format,
        tx_hireme_hide_newtime,
        tx_hireme_hide_toptime,
        tx_hireme_hide_filter,
        tx_hireme_hide_map,
        tx_hireme_hide_search,
        tx_hireme_hide_orderby,
        tx_hireme_show_direct_apply_link,',
    'hireme_jobpostingsearch',
    'after:subheader',
);




/** @noinspection SpellCheckingInspection */
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    'tx_hireme_fallback_page,
        tx_hireme_date_format,
        tx_hireme_hide_newtime,
        tx_hireme_hide_toptime,
        tx_hireme_hide_valid_through,
        tx_hireme_hide_job_start_date,
        tx_hireme_hide_location,
        tx_hireme_hide_companies,
        tx_hireme_btn_overview_link,
        tx_hireme_btn_overview_text,',
    'hireme_jobpostingdetails',
    'after:subheader',
);
