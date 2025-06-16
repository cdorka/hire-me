<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Job;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Education requirements options
 */
enum ExperienceRequirementsType: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    /**
     * TODO free text
     */
    case TEXT = 0;

    /**
     * TODO number of month of exp
     */
    case MONTH = 1;


    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'tx_hireme_jobposting.experience_requirements_type';
}
