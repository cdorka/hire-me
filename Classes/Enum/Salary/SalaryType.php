<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Salary;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Base salary type options
 */
enum SalaryType: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    /**
     * Fixed salary amount
     */
    case SALARY = 0;

    /**
     * Salary range (min-max)
     */
    case SALARY_RANGE = 1;

    /**
     * Path to the language file
     */
    const EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const LABEL_KEY = 'tx_hireme_jobposting.base_salary_type';
}
