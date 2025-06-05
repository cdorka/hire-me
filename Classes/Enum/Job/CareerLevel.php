<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Job;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Education requirements options
 */
enum CareerLevel: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    case ALL = 0;
    case CAREER_STARTER = 1;
    case JUNIOR = 2;
    case MID_LEVEL = 3;
    case SENIOR = 4;
    case LEAD_MANAGER = 5;

    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'tx_hireme_domain_model_jobposting.career_level';
}
