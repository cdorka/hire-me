<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum;

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
enum FilterOptionGenerationTypeEnum: int
{
    use TcaItemsTrait;

    const EXT_LANGUAGE_FILE_PATH = 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf';
    const LABEL_KEY = 'enum.filter_option_generation_type';

    case GENERATED = 0;
    case MANUALLY = 1;
}
