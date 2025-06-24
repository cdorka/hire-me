<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Job;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Employment type options
 */
enum EmploymentType: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    /**
     * Full-time employment
     */
    case FULL_TIME = 0;

    /**
     * Part-time employment
     */
    case PART_TIME = 1;

    /**
     * Temporary employment
     */
    case TEMPORARY = 2;

    /**
     * Internship
     */
    case INTERN = 3;

    /**
     * Volunteer position
     */
    case VOLUNTEER = 4;

    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'tx_hireme_jobposting.employment_types';
}
