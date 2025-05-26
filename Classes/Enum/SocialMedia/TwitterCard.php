<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum\SocialMedia;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;
use ChristianDorka\HireMe\Enum\LanguageFilePaths;

/**
 * Twitter card type options
 */
enum TwitterCard: int implements LanguageFilePaths
{
    use EnumTcaTrait;

    /**
     * Standard summary card
     */
    case SUMMARY = 0;

    /**
     * Summary card with large image
     */
    case SUMMARY_LARGE_IMAGE = 1;

    /**
     * Path to the language file
     */
    const string EXT_LANGUAGE_FILE_PATH = self::BASICS_LANGUAGE_PATH;

    /**
     * Key for the label in language file
     */
    const string LABEL_KEY = 'twitter_card';
}
