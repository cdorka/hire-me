<?php
// Configuration/TCA/Overrides/pages.php oder ähnlich
// SEO Palette TCA Konfiguration

// Neue Felder zur pages Tabelle hinzufügen
$tempColumns = [
    // SEO Palette Felder
    'seo_title' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.seo_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
            'eval' => 'trim',
        ],
    ],
    'hide_seo_sitetitle' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.hide_seo_sitetitle',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'description' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.description',
        'config' => [
            'type' => 'text',
            'cols' => 50,
            'rows' => 3,
        ],
    ],

    // Robot Palette Felder
    'no_index' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.no_index',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
    'no_follow' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.no_follow',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],

    // Canonical Palette Felder
    'canonical_link' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.canonical_link',
        'description' => 'Eine kanonische URL ist die URL einer Seite, die als Repräsentativste aus einer Reihe von Seiten mit (fast) gleichem Inhalt Suchmaschinen empfohlen wird. Dieser Prozess, der oft als Deduplication bezeichnet wird, hilft Suchmaschinen, nur eine Version des zu indexieren und verhindert eine Abwertung der Seiten mit ähnlichem Inhalt. <br/> TYPO3 setzt dies automatisch auf die wahrscheinlichste URL der Seite, wenn sie nicht explizit gesetzt wird - was höchstwahrscheinlich die URL der Seite selbst ist. <br/> Wenn hier gesetzt, wird die Seite aus der XML-Sitemap entfernt.',
        'config' => [
            'type' => 'link',
            'allowedTypes' => ['page', 'url', 'record'],
        ],
    ],

    // Sitemap Palette Felder
    'sitemap_changefreq' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.sitemap_changefreq',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['label' => 'LLL:EXT:seo/Resources/Private/Language/locallang_tca.xlf:pages.sitemap_changefreq.none', 'value' => ''],
                ['label' => 'LLL:EXT:seo/Resources/Private/Language/locallang_tca.xlf:pages.sitemap_changefreq.always', 'value' => 'always'],
                ['label' => 'LLL:EXT:seo/Resources/Private/Language/locallang_tca.xlf:pages.sitemap_changefreq.hourly', 'value' => 'hourly'],
                ['label' => 'LLL:EXT:seo/Resources/Private/Language/locallang_tca.xlf:pages.sitemap_changefreq.daily', 'value' => 'daily'],
                ['label' => 'LLL:EXT:seo/Resources/Private/Language/locallang_tca.xlf:pages.sitemap_changefreq.weekly', 'value' => 'weekly'],
                ['label' => 'LLL:EXT:seo/Resources/Private/Language/locallang_tca.xlf:pages.sitemap_changefreq.monthly', 'value' => 'monthly'],
                ['label' => 'LLL:EXT:seo/Resources/Private/Language/locallang_tca.xlf:pages.sitemap_changefreq.yearly', 'value' => 'yearly'],
                ['label' => 'LLL:EXT:seo/Resources/Private/Language/locallang_tca.xlf:pages.sitemap_changefreq.never', 'value' => 'never'],
            ],
        ],
    ],
    'sitemap_priority' => [
        'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.sitemap_priority',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'default' => '0.5',
            'items' => [
                ['label' => '0.0', 'value' => '0.0'],
                ['label' => '0.1', 'value' => '0.1'],
                ['label' => '0.2', 'value' => '0.2'],
                ['label' => '0.3', 'value' => '0.3'],
                ['label' => '0.4', 'value' => '0.4'],
                ['label' => '0.5', 'value' => '0.5'],
                ['label' => '0.6', 'value' => '0.6'],
                ['label' => '0.7', 'value' => '0.7'],
                ['label' => '0.8', 'value' => '0.8'],
                ['label' => '0.9', 'value' => '0.9'],
                ['label' => '1.0', 'value' => '1.0'],
            ],
        ],
    ],
];

// Felder zur pages Tabelle hinzufügen
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tempColumns);

// Paletten definieren
$GLOBALS['TCA']['pages']['palettes']['palette_seo'] = [
    'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_seo',
    'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_seo.description',
    'showitem' => 'seo_title,--linebreak--,hide_seo_sitetitle,--linebreak--,description',
];

$GLOBALS['TCA']['pages']['palettes']['palette_robots'] = [
    'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_robots',
    'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_robots.description',
    'showitem' => 'no_index,no_follow',
];

$GLOBALS['TCA']['pages']['palettes']['palette_canonical'] = [
    'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_canonical',
    'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_canonical.description',
    'showitem' => 'canonical_link',
];

$GLOBALS['TCA']['pages']['palettes']['palette_sitemap'] = [
    'label' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_sitemap',
    'description' => 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.palette_sitemap.description',
    'showitem' => 'sitemap_changefreq,sitemap_priority',
];

// Tab zu pages hinzufügen (Beispiel)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf:pages.tab.seo,
    --palette--;;palette_seo,
    --palette--;;palette_robots,
    --palette--;;palette_canonical,
    --palette--;;palette_sitemap',
    '',
    'after:layout'
);
