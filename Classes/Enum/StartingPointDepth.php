<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum;

use ChristianDorka\HireMe\Traits\TcaItemsTrait;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
enum StartingPointDepth: int
{
    use TcaItemsTrait;

    const EXT_LANGUAGE_FILE_PATH = 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf';
    const LABEL_KEY = 'enum.starting_point_depth';

    case ONLY_SELECTION = 0;
    case LEVELS_1 = 1;
    case LEVELS_2 = 2;
    case LEVELS_3 = 3;
    case LEVELS_4 = 4;
    case INFINITE = 250;
}
