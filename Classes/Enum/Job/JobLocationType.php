<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Job;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Job location type options
 */
enum JobLocationType: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    /**
     * On-site work location
     */
    case ON_SITE = 0;

    /**
     * Remote work (telecommute)
     */
    case TELECOMMUTE = 1;

    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'tx_hireme_jobposting.job_location_type';
}
