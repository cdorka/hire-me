<?php
declare(strict_types=1);

use ChristianDorka\HireMe\Enum\FilterOptionGenerationTypeEnum;
use ChristianDorka\HireMe\Enum\LogicalOperatorEnum;
use ChristianDorka\HireMe\Enum\PaginationPositionEnum;
use ChristianDorka\HireMe\Enum\PaginationTypeEnum;
use ChristianDorka\HireMe\Enum\StartingPointDepth;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$languageFile = 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:';


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


ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_hireme_header' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_header.label',
        'description' => $languageFile . 'tt_content.tx_hireme_header.description',
        'config' => [
            'type' => 'text',
            'enableRichtext' => true,
        ],
    ],
    'tx_hireme_text' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_text.label',
        'description' => $languageFile . 'tt_content.tx_hireme_text.description',
        'config' => [
            'type' => 'text',
            'enableRichtext' => true,
        ],
    ],
    "tx_hireme_detail_page" => [
        "exclude" => false,
        "label" => $languageFile . "tt_content.tx_hireme_detail_page.label",
        "description" => $languageFile . "tt_content.tx_hireme_detail_page.description",
        "config" => [
            "type" => "group",
            "internal_type" => "db",
            "allowed" => "pages",
            "size" => 1,
            "maxitems" => 1,
            "minitems" => 0,
            "default" => null,
            "suggestOptions" => [
                "default" => [
                    "searchWholePhrase" => true,
                ],
            ],
            "behaviour" => [
                "allowLanguageSynchronization" => true,
            ],
            "eval" => "int,null",
            "fieldControl" => [
                "elementBrowser" => [
                    "disabled" => false,
                ],
            ],
        ],
    ],
    "tx_hireme_fallback_page" => [
        "exclude" => false,
        "label" => $languageFile . "tt_content.tx_hireme_fallback_page.label",
        "description" => $languageFile . "tt_content.tx_hireme_fallback_page.description",
        "config" => [
            "type" => "group",
            "internal_type" => "db",
            "allowed" => "pages",
            "size" => 1,
            "maxitems" => 1,
            "minitems" => 0,
            "default" => null,
            "suggestOptions" => [
                "default" => [
                    "searchWholePhrase" => true,
                ],
            ],
            "behaviour" => [
                "allowLanguageSynchronization" => true,
            ],
            "eval" => "int,null",
            "fieldControl" => [
                "elementBrowser" => [
                    "disabled" => false,
                ],
            ],
        ],
    ],
    'tx_hireme_btn_overview_link' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_btn_overview_link.label',
        'description' => $languageFile . 'tt_content.tx_hireme_btn_overview_link.description',
        'config' => [
            'type' => 'link',
        ],
    ],
    'tx_hireme_btn_overview_text' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_btn_overview_text.label',
        'description' => $languageFile . 'tt_content.tx_hireme_btn_overview_text.description',
        'config' => [
            'type' => 'text',
            'rows' => 2,
        ],
    ],
    'tx_hireme_hide_newtime' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_newtime.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_newtime.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_toptime' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_toptime.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_toptime.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_map' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_map.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_map.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_search' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_search.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_search.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_orderby' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_orderby.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_orderby.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_filter' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_filter.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_filter.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_valid_through' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_valid_through.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_valid_through.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_job_start_date' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_job_start_date.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_job_start_date.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_location' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_location.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_location.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_hide_companies' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_hide_companies.label',
        'description' => $languageFile . 'tt_content.tx_hireme_hide_companies.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_results_limit' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_results_limit.label',
        'description' => $languageFile . 'tt_content.tx_hireme_results_limit.description',
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
        'label' => $languageFile . 'tt_content.tx_hireme_show_direct_apply_link.label',
        'description' => $languageFile . 'tt_content.tx_hireme_show_direct_apply_link.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'tx_hireme_date_format' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_show_direct_apply_link.label',
        'description' => $languageFile . 'tt_content.tx_hireme_show_direct_apply_link.description',
        "config" => [
            "type" => "select",
            "renderType" => "selectSingle",
            "items" => \ChristianDorka\HireMe\Enum\DateFormat::getTcaItems(),
            "default" => \ChristianDorka\HireMe\Enum\DateFormat::FULL_DATE->value,
        ],
    ],


    'tx_hireme_filter_employment_types' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_employment_types.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_employment_types.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            "items" => \ChristianDorka\HireMe\Enum\Job\EmploymentType::getTcaItems()
        ],
    ],
    'tx_hireme_filter_career_levels' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_career_levels.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_career_levels.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            "items" => \ChristianDorka\HireMe\Enum\Job\CareerLevel::getTcaItems()
        ],
    ],
    'tx_hireme_filter_scopes' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_scopes.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_scopes.description',
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
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_hireme_source_starting_points' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_starting_points.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_starting_points.description',
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
        'label' => $languageFile . 'tt_content.tx_hireme_source_include_selected_starting_point.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_include_selected_starting_point.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_source_starting_point_depth' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_starting_point_depth.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_starting_point_depth.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_source_categories' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_categories.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_categories.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_category',
            'MM' => 'tx_cpblog_ttcontent_category_mm',
        ],
    ],
    'tx_hireme_source_categories_logical_operator' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_categories_logical_operator.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_categories_logical_operator.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
    'tx_hireme_source_country' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_country.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_country.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_country',
            'MM' => 'tx_cpblog_ttcontent_country_mm',
        ],
    ],
    'tx_hireme_source_country_logical_operator' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_country_logical_operator.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_country_logical_operator.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
    'tx_hireme_source_location' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_location.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_location.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_location',
            'MM' => 'tx_cpblog_ttcontent_location_mm',
        ],
    ],
    'tx_hireme_source_location_logical_operator' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_location_logical_operator.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_location_logical_operator.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
    'tx_hireme_source_department' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_department.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_department.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_department',
            'MM' => 'tx_cpblog_ttcontent_department_mm',
        ],
    ],
    'tx_hireme_source_department_logical_operator' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_department_logical_operator.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_department_logical_operator.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
    'tx_hireme_source_organization' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_organization.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_organization.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_organization',
            'MM' => 'tx_cpblog_ttcontent_organization_mm',
        ],
    ],
    'tx_hireme_source_organization_logical_operator' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_organization_logical_operator.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_organization_logical_operator.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => LogicalOperatorEnum::getTcaItems(),
            'default' => LogicalOperatorEnum::OR->value,
        ],
    ],
]);
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_hireme_source_starting_points' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_starting_points.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_starting_points.description',
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
        'label' => $languageFile . 'tt_content.tx_hireme_filter_show_text.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_show_text.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_show_category' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_show_category.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_show_category.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_category_type' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_category_type.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_category_type.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_categories' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_categories.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_categories.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_category',
            'MM' => 'tx_cpblog_ttcontent_category_mm',
        ],
    ],

'tx_hireme_filter_category_starting_points' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_category_starting_points.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_category_starting_points.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_category_include_selected_starting_point' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_category_include_selected_starting_point.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_category_include_selected_starting_point.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_category_starting_point_depth' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_category_starting_point_depth.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_category_starting_point_depth.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_filter_show_location' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_show_location.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_show_location.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_location_type' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_location_type.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_location_type.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_locations' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_locations.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_locations.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_location',
            'MM' => 'tx_cpblog_ttcontent_location_mm',
        ],
    ],

'tx_hireme_filter_location_starting_points' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_location_starting_points.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_location_starting_points.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_location_include_selected_starting_point' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_location_include_selected_starting_point.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_location_include_selected_starting_point.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_location_starting_point_depth' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_location_starting_point_depth.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_location_starting_point_depth.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_filter_show_country' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_show_country.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_show_country.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_country_type' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_country_type.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_country_type.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_countries' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_countries.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_countries.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_country',
            'MM' => 'tx_cpblog_ttcontent_country_mm',
        ],
    ],

'tx_hireme_filter_country_starting_points' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_country_starting_points.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_country_starting_points.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_country_include_selected_starting_point' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_country_include_selected_starting_point.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_country_include_selected_starting_point.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_country_starting_point_depth' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_country_starting_point_depth.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_country_starting_point_depth.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_filter_show_department' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_show_department.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_show_department.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_department_type' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_department_type.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_department_type.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_departments' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_departments.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_departments.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_department',
            'MM' => 'tx_cpblog_ttcontent_department_mm',
        ],
    ],

'tx_hireme_filter_department_starting_points' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_department_starting_points.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_department_starting_points.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_department_include_selected_starting_point' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_department_include_selected_starting_point.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_department_include_selected_starting_point.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_department_starting_point_depth' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_department_starting_point_depth.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_department_starting_point_depth.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
    'tx_hireme_filter_show_organization' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_show_organization.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_show_organization.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_organization_type' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_organization_type.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_organization_type.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => FilterOptionGenerationTypeEnum::getTcaItems(),
            'default' => FilterOptionGenerationTypeEnum::GENERATED->value,
        ],
    ],
    'tx_hireme_filter_organizations' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_organizations.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_organizations.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_hireme_organization',
            'MM' => 'tx_cpblog_ttcontent_organization_mm',
        ],
    ],

'tx_hireme_filter_organization_starting_points' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_organization_starting_points.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_organization_starting_points.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_organization_include_selected_starting_point' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_organization_include_selected_starting_point.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_organization_include_selected_starting_point.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_filter_organization_starting_point_depth' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_filter_organization_starting_point_depth.label',
        'description' => $languageFile . 'tt_content.tx_hireme_filter_organization_starting_point_depth.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => StartingPointDepth::getTcaItems(),
            'default' => StartingPointDepth::INFINITE->value,
        ],
    ],
]);
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_hireme_display_show_number_of_results' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_display_show_number_of_results,.label',
        'description' => $languageFile . 'tt_content.tx_hireme_display_show_number_of_results,.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
]);
ExtensionManagementUtility::addTCAcolumns('tt_content', [
    'tx_hireme_pagination_show' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_pagination_show,.label',
        'description' => $languageFile . 'tt_content.tx_hireme_pagination_show,.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_pagination_type' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_pagination_type.label',
        'description' => $languageFile . 'tt_content.tx_hireme_pagination_type.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => PaginationTypeEnum::getTcaItems(),
            'default' => PaginationTypeEnum::DOTS->value,
        ],
    ],
    'tx_hireme_pagination_items_per_page' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_pagination_items_per_page.label',
        'description' => $languageFile . 'tt_content.tx_hireme_pagination_items_per_page.description',
        'config' => [
            'type' => 'number',
            'default' => 12,
            'range' => [
                'lower' => 1,
            ],
        ],
    ],
    'tx_hireme_pagination_show_prev_next' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_pagination_show_prev_next,.label',
        'description' => $languageFile . 'tt_content.tx_hireme_pagination_show_prev_next,.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_pagination_show_first_last' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_pagination_show_first_last,.label',
        'description' => $languageFile . 'tt_content.tx_hireme_pagination_show_first_last,.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'tx_hireme_pagination_max_number_of_dots' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_pagination_max_number_of_dots.label',
        'description' => $languageFile . 'tt_content.tx_hireme_pagination_max_number_of_dots.description',
        'config' => [
            'type' => 'number',
            'default' => null,
            'nullable' => true,
        ],
    ],
    'tx_hireme_pagination_position' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_pagination_position.label',
        'description' => $languageFile . 'tt_content.tx_hireme_pagination_position.description',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => PaginationPositionEnum::getTcaItems(),
            'default' => PaginationPositionEnum::AFTER->value,
        ],
    ],
    'tx_hireme_source_include_selected_starting_point' => [
        'exclude' => true,
        'label' => $languageFile . 'tt_content.tx_hireme_source_include_selected_starting_point.label',
        'description' => $languageFile . 'tt_content.tx_hireme_source_include_selected_starting_point.description',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
]);

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
                ,
            --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tabs.pagination_config,
                tx_hireme_pagination_show,
                tx_hireme_pagination_type,
                tx_hireme_pagination_items_per_page,
                tx_hireme_pagination_show_prev_next,
                tx_hireme_pagination_show_first_last,
                tx_hireme_pagination_max_number_of_dots,
                tx_hireme_pagination_position,
                tx_hireme_source_include_selected_starting_point,
        ',
    'hireme_jobpostinglatest',
    'after:subheader',
);





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
