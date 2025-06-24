<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Job;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Education requirements type options
 */
enum EducationRequirementsType: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    /**
     * TODO
     */
    case FREE_TEXT = 0;

    /**
     * TODO
     */
    case SELECTION = 1;


    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'tx_hireme_jobposting.education_requirements_type';
}
