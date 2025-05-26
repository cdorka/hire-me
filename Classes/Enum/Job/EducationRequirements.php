<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\Job;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Education requirements options
 */
enum EducationRequirements: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    /**
     * No formal education requirements
     */
    case NO_REQUIREMENTS = 0;

    /**
     * High school diploma or equivalent
     */
    case HIGH_SCHOOL = 2;

    /**
     * Associate degree
     */
    case ASSOCIATE_DEGREE = 3;

    /**
     * Bachelor's degree
     */
    case BACHELOR_DEGREE = 4;

    /**
     * Professional certificate or license
     */
    case PROFESSIONAL_CERTIFICATE = 5;

    /**
     * Postgraduate degree (Master's, PhD, etc.)
     */
    case POSTGRADUATE_DEGREE = 6;

    /**
     * Path to the language file
     */
    const string EXT_LANGUAGE_FILE_PATH = self::JOB_POSTING_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const string LABEL_KEY = 'education_requirements';
}
