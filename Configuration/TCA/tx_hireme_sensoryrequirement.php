<?php
declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_sensoryrequirement',
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
        'hideAtCopy' => true,
        'searchFields' => 'title,slug',
        'iconfile' => 'EXT:hire_me/Resources/Public/Icons/tx_hireme_sensoryrequirement.svg',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'columns' => [
        // Custom fields
        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_sensoryrequirement.title',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim',
                'required' => true,
            ],
        ],
        'slug' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_sensoryrequirement.slug',
            'config' => [
                'type' => 'slug',
                'generatorOptions' => [
                    'fields' => ['title'],
                    'fieldSeparator' => '-',
                    'prefixParentPageSlug' => false,

                    'replacements' => \ChristianDorka\HireMe\UserFuncs\FormEngine\ReplacementsProcFunc::generalSlugProcFunc(),
                ],
                'fallbackCharacter' => '-',
                'eval' => 'unique',
                'default' => '',
                'required' => true,
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_sensoryrequirement.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'softref' => 'email[subst],url',
            ],
        ],
        'icon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_sensoryrequirement.icon',
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
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_sensoryrequirement.job_postings',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_jobposting',
                'MM' => 'tx_hireme_jobposting_sensoryrequirement_mm',
                'MM_opposite_field' => 'sensory_requirements',
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
                'foreign_table' => 'tx_hireme_sensoryrequirement',
                'foreign_table_where' => 'AND {#tx_hireme_sensoryrequirement}.{#pid}=###CURRENT_PID### AND {#tx_hireme_sensoryrequirement}.{#sys_language_uid} IN (-1,0)',
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
    'palettes' => [
        'hidden' => [
            'showitem' => 'hidden',
        ],
        'access' => [
            'showitem' => 'starttime;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime,endtime;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime,--linebreak--,fe_group;LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
        ],
        'language' => [
            'showitem' => 'sys_language_uid,l10n_parent',
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    title,slug,description,icon,job_postings,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
            '
        ],
    ],
];
