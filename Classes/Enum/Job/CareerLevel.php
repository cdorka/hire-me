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

    case CAREER_STARTER = 0;
    case JUNIOR = 1;
    case MID_LEVEL = 2;
    case SENIOR = 3;
    case LEAD_MANAGER = 4;

    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'tx_hireme_jobposting.career_level';
}
