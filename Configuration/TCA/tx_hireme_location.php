<?php
declare(strict_types=1);

return [
    'ctrl' => [
        'title' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location',
        'label' => 'title',
        'label_alt' => 'street_name,house_number,city',
        'label_alt_force' => true,
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
        'searchFields' => 'title,street_name,house_number,postal_code,city,region',
        'iconfile' => 'EXT:hire_me/Resources/Public/Icons/tx_hireme_location.svg',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'columns' => [
        // Custom fields from Content Block
        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.title.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.title.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim',
            ],
        ],
        'street_name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.street_name.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.street_name.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim',
            ],
        ],
        'house_number' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.house_number.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.house_number.description',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'max' => 50,
                'eval' => 'trim',
            ],
        ],
        'postal_code' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.postal_code.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.postal_code.description',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'max' => 20,
                'eval' => 'trim',
            ],
        ],
        'city' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.city.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.city.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim',
            ],
        ],
        'region' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.region.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.region.description',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim',
            ],
        ],
        'country' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.country.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.country.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_hireme_country',
                'foreign_table_where' => 'AND {#tx_hireme_country}.{#sys_language_uid} IN (-1,0)',
                'items' => [
                    [
                        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.country.empty.label',
                        'value' => 0,
                    ],
                ],
                'default' => 0,
            ],
        ],
        'job_postings' => [
            'exclude' => false,
            'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.job_postings.label',
            'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:tx_hireme_location.job_postings.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_hireme_jobposting',
                'foreign_table_where' => 'AND {#tx_hireme_jobposting}.{#sys_language_uid} IN (-1,0)',
                'MM' => 'tx_hireme_jobposting_location_mm',
                'MM_opposite_field' => 'locations',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 9999,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                        'options' => [
                            'windowOpenParameters' => 'height=800,width=1000,status=0,menubar=0,scrollbars=1',
                        ],
                    ],
                    'addRecord' => [
                        'disabled' => false,
                        'options' => [
                            'setValue' => 'prepend',
                        ],
                    ],
                    'listModule' => [
                        'disabled' => false,
                    ],
                ],
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
        'address' => [
            'showitem' => 'street_name,house_number,--linebreak--,postal_code,city,--linebreak--,region,country',
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    title,
                    --palette--;;address,
                --div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_tabs.xlf:relations,
                    job_postings,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
            '
        ],
    ],
];
