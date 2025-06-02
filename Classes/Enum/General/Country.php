<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\General;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Country options
 */
enum Country: int implements LanguageFilePaths
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
     * Contractor or freelance
     */
    case CONTRACTOR = 2;

    /**
     * Temporary employment
     */
    case TEMPORARY = 3;

    /**
     * Internship
     */
    case INTERN = 4;

    /**
     * Volunteer position
     */
    case VOLUNTEER = 5;

    /**
     * Other employment type
     */
    case OTHER = 6;

    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'employment_type';
}
