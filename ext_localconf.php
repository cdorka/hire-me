<?php

declare(strict_types=1);

use ChristianDorka\HireMe\Controller\JobPostingController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die('Access denied.');

(static function () {
    // Add default RTE configuration
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['hire_me'] = 'EXT:hire_me/Configuration/RTE/Default.yaml';


    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['hire'] = ['ChristianDorka\\HireMe\\ViewHelpers'];

    ExtensionUtility::configurePlugin(
        'hire_me',
        'JobPostingDetails',
        [JobPostingController::class => 'detail'],
        [],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    ExtensionUtility::configurePlugin(
        'hire_me',
        'JobPostingList',
        [JobPostingController::class => 'list'],
        [],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    ExtensionUtility::configurePlugin(
        'hire_me',
        'JobPostingLatest',
        [JobPostingController::class => 'latest'],
        [],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    ExtensionUtility::configurePlugin(
        'hire_me',
        'JobPostingFilter',
        [JobPostingController::class => 'filter'],
        [],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );
})();

