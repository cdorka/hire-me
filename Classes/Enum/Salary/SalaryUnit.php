<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Salary;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Base salary time unit options
 */
enum SalaryUnit: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    /**
     * Per hour
     */
    case HOUR = 0;

    /**
     * Per day
     */
    case DAY = 1;

    /**
     * Per week
     */
    case WEEK = 2;

    /**
     * Per month
     */
    case MONTH = 3;

    /**
     * Per year
     */
    case YEAR = 4;

    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'base_salary_unit';
}
