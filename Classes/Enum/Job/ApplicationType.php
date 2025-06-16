<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Job;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

enum ApplicationType: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    case NONE = 0;

    case EMAIL = 1;
    case EXTERNAL_LINK = 2;
    case TYPO3_FORM = 3;

    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH =  'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf';

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'tx_hireme_jobposting.applicationType';
}
