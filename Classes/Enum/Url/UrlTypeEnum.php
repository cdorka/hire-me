<?php

/**
 * TODO
 * php version 8.2
 *
 * @category     TODO
 * @package      TODO
 * @license      TODO
 * @author       Christian Dorka <mail@christiandorka.de>
 */

declare(strict_types=1);
namespace ChristianDorka\HireMe\Enum\Url;

use ChristianDorka\HireMe\Enum\EnumTcaTrait;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
enum UrlTypeEnum: int
{
    use EnumTcaTrait;

    const string EXT_LANGUAGE_FILE_PATH = 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf';
    const string LABEL_KEY = 'enum.url_type_enum';

    case NOT_SET = 0;
    case GENERAL = 1;
    case FACEBOOK = 2;
    case INSTAGRAM = 3;
    case TWITTER = 4;
    case LINKEDIN = 5;
    case XING = 6;
    case YOUTUBE = 7;
    case TIKTOK = 8;
    case MASTODON = 9;
    case SNAPCHAT = 10;
    case TELEGRAM = 11;
    case PINTEREST = 12;
    case REDDIT = 13;
    case TWITCH = 14;
    case DISCORD = 15;
}
