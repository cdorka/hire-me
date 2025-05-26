<?php


defined('TYPO3') or die('Access denied.');

// Add default RTE configuration
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['hire_me'] = 'EXT:hire_me/Configuration/RTE/Default.yaml';


$GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['hire'] = ['ChristianDorka\\HireMe\\ViewHelpers'];

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'hire_me',
    'JobPostingDetails',
    [ \ChristianDorka\HireMe\Controller\JobPostingController::class => 'detail'],
    [],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'hire_me',
    'JobPostingList',
    [ \ChristianDorka\HireMe\Controller\JobPostingController::class => 'list'],
    [],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'hire_me',
    'JobPostingLatest',
    [ \ChristianDorka\HireMe\Controller\JobPostingController::class => 'latest'],
    [],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'hire_me',
    'JobPostingFilter',
    [ \ChristianDorka\HireMe\Controller\JobPostingController::class => 'filter'],
    [],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
