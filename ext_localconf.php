<?php
declare(strict_types=1);

use ChristianDorka\HireMe\Controller\JobPostingController;
use ChristianDorka\HireMe\Registry\ApplicationFormRegistry;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die('Access denied.');

(static function () {
    // Add default RTE configuration
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['hire_me'] = 'EXT:hire_me/Configuration/RTE/Default.yaml';


    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['hire'] = ['ChristianDorka\\HireMe\\ViewHelpers'];

    ExtensionUtility::configurePlugin(
        'hire_me',
        'JobPostingDetails',
        [JobPostingController::class => 'detail,perform'],
        [JobPostingController::class => 'perform'],
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
        'JobPostingSearch',
        [JobPostingController::class => 'search'],
        [],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    /** @var ApplicationFormRegistry $applicationFormRegistry */
    $applicationFormRegistry = GeneralUtility::makeInstance(ApplicationFormRegistry::class);
    $applicationFormRegistry->registerForm(
        identifier: 'basicApplicationForm',
        path: "EXT:hire_me/Resources/Private/Forms/BasicApplicationForm.form.yaml",
        label: "Basic application form",
    );
    $applicationFormRegistry->registerForm(
        identifier: "basicApprenticeApplicationForm",
        path: "EXT:hire_me/Resources/Private/Forms/BasicApprenticeApplicationForm.form.yaml",
        label: "Basic application form for apprenticeships",
    );


})();
