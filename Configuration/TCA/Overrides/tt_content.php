<?php
declare(strict_types=1);

use ChristianDorka\HireMe\Configuration\Localization;
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






\ChristianDorka\HireMe\Configuration\TtContent::registerCategoryFilterFields();
\ChristianDorka\HireMe\Configuration\TtContent::registerSysCategoryFilterFields();
\ChristianDorka\HireMe\Configuration\TtContent::registerLocationFilterFields();
\ChristianDorka\HireMe\Configuration\TtContent::registerCountryFilterFields();
\ChristianDorka\HireMe\Configuration\TtContent::registerDepartmentFilterFields();
\ChristianDorka\HireMe\Configuration\TtContent::registerOrganizationFilterFields();

\ChristianDorka\HireMe\Configuration\TtContent::registerPaginationFields();


\ChristianDorka\HireMe\Configuration\TtContent::registerGeneralSourceFields();
\ChristianDorka\HireMe\Configuration\TtContent::registerSourceFields('category');
\ChristianDorka\HireMe\Configuration\TtContent::registerSourceFields('syscategory');
\ChristianDorka\HireMe\Configuration\TtContent::registerSourceFields('location');
\ChristianDorka\HireMe\Configuration\TtContent::registerSourceFields('country');
\ChristianDorka\HireMe\Configuration\TtContent::registerSourceFields('department');
\ChristianDorka\HireMe\Configuration\TtContent::registerSourceFields('organization');





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
                --palette--;;source_general,
                --palette--;;source_category,
                --palette--;;source_syscategory,
                --palette--;;source_location,
                --palette--;;source_country,
                --palette--;;source_department,
                --palette--;;source_organization,

            --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tabs.filter_config,
                --palette--;;filter_category,
                --palette--;;filter_syscategory,
                --palette--;;filter_location,
                --palette--;;filter_country,
                --palette--;;filter_department,
                --palette--;;filter_organization,

            --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tabs.pagination_config,
                --palette--;;pagination,
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
