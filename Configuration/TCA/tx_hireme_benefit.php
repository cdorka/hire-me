<?php
declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_benefit',
        'label' => 'title',
        'descriptionColumn' => 'internal_description',
        'sortby' => 'sorting',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'versioningWS' => true,
        'versioningWS_alwaysAllowLiveEdit' => true,
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
        'searchFields' => 'title,description',
        'hideAtCopy' => true,
        'iconfile' => 'EXT:hire_me/Resources/Public/Icons/tx_hireme_benefit.svg',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
    ],
    'columns' => [
        // Custom fields
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_benefit.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'slug' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_benefit.slug',
            'config' => [
                'type' => 'slug',
                'generatorOptions' => [
                    'fields' => ['title'],
                    'replacements' => \ChristianDorka\HireMe\UserFuncs\FormEngine\ReplacementsProcFunc::generalSlugProcFunc(),
                ],
                'fallbackCharacter' => '-',
                'eval' => 'unique',
                'required' => true,
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_benefit.description',
            'config' => [
                'type' => 'text',
                'rows' => 3,
            ],
        ],
        'icon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_benefit.icon',
            'config' => [
                'type' => 'file',
                'allowed' => 'png,jpg,jpeg,gif,webp',
                'maxitems' => 1,
                'appearance' => [
                    'fileUploadAllowed' => false,
                    'fileByUrlAllowed' => false,
                ],
            ],
        ],
        'job_postings' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_benefit.job_postings',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_jobposting',
                'MM' => 'tx_hireme_jobposting_benefit_mm',
                'MM_opposite_field' => 'benefits',
                'size' => 10,
                'maxitems' => 9999,
            ],
        ],

        // System fields
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        'label' => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'datetime',
                'default' => 0,

            ],
        ],
        'fe_group' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                        'value' => -1,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                        'value' => -2,
                    ],
                    [
                        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                        'value' => '--div--',
                    ],
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
            ],
        ],
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_hireme_physicalrequirement',
                'foreign_table_where' => 'AND {#tx_hireme_physicalrequirement}.{#pid}=###CURRENT_PID### AND {#tx_hireme_physicalrequirement}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ],
        ],
        'crdate' => [
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'tstamp' => [
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ]
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    title, slug, description, icon, job_postings,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden, starttime, endtime, fe_group
            ',
        ],
    ],
];
