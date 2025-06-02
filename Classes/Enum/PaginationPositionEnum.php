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

namespace ChristianDorka\HireMe\Enum;

use ChristianDorka\HireMe\Trait\TcaItemsTrait;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
enum PaginationPositionEnum: int
{
    use TcaItemsTrait;

    const EXT_LANGUAGE_FILE_PATH = 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf';
    const LABEL_KEY = 'enum.pagination_position';

    case AFTER = 0;
    case BEFORE = 1;
    case BEFORE_AND_AFTER = 2;
}
