<?php
// Configuration/TCA/Overrides/pages.php oder ähnlich
// Social Media Palette TCA Konfiguration

$tempColumnsSocial = [
    // Open Graph (Facebook) Felder
    'og_title' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.og_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
            'eval' => 'trim',
        ],
    ],
    'og_description' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.og_description',
        'config' => [
            'type' => 'text',
            'cols' => 50,
            'rows' => 3,
        ],
    ],
    'og_image' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.og_image',
        'config' => [
            'type' => 'file',
            'allowed' => 'jpeg,png,webp',
            'minitems' => 0,
            'maxitems' => 1,
            'appearance' => [
                'fileUploadAllowed' => false,
            ],
            'overrideChildTca' => [
                'types' => [
                    \TYPO3\CMS\Core\Resource\FileType::IMAGE->value => [
                        'showitem' => '--palette--;;imageoverlayPalette,--palette--;;filePalette',
                    ],
                ],
                'columns' => [
                    'crop' => [
                        'config' => [
                            'cropVariants' => [
                                'social' => [
                                    'title' => '1.91:1',
                                    'allowedAspectRatios' => [
                                        '1.91x1' => [
                                            'title' => '1.91:1',
                                            'value' => 1200 / 630,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    // X/Twitter Cards Felder
    'twitter_title' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.twitter_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
            'eval' => 'trim',
        ],
    ],
    'twitter_description' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.twitter_description',
        'config' => [
            'type' => 'text',
            'cols' => 50,
            'rows' => 3,
        ],
    ],
    'twitter_image' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.twitter_image',
        'config' => [
            'type' => 'file',
            'allowed' => 'jpeg,png,webp',
            'minitems' => 0,
            'maxitems' => 1,
            'appearance' => [
                'fileUploadAllowed' => false,
            ],
            'overrideChildTca' => [
                'types' => [
                    \TYPO3\CMS\Core\Resource\FileType::IMAGE->value => [
                        'showitem' => '--palette--;;imageoverlayPalette,--palette--;;filePalette',
                    ],
                ],
                'columns' => [
                    'crop' => [
                        'config' => [
                            'cropVariants' => [
                                'social' => [
                                    'title' => '1.91:1',
                                    'allowedAspectRatios' => [
                                        '1.91x1' => [
                                            'title' => '1.91:1',
                                            'value' => 1200 / 630,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'twitter_card' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.twitter_card',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'itemsProcFunc' => \ChristianDorka\HireMe\UserFunction\FormEngine\SeoItemsProcFunc::class . '->twitterCardItemsProcFunc',
        ],
    ],
];

// Felder zur pages Tabelle hinzufügen
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumnsSocial);

// Paletten definieren
$GLOBALS['TCA']['pages']['palettes']['palette_open_graph_facebook'] = [
    'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_open_graph_facebook',
    'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_open_graph_facebook.description',
    'showitem' => 'og_title,--linebreak--,og_description,--linebreak--,og_image',
];

$GLOBALS['TCA']['pages']['palettes']['palette_open_graph_twitter'] = [
    'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_open_graph_twitter',
    'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_open_graph_twitter.description',
    'showitem' => 'twitter_title,--linebreak--,twitter_description,--linebreak--,twitter_image,--linebreak--,twitter_card',
];

// Tab zu pages hinzufügen (Beispiel)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.tab.social_media,
    --palette--;;palette_open_graph_facebook,
    --palette--;;palette_open_graph_twitter',
    '',
    'after:layout'
);
