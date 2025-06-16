<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Enum;

use ChristianDorka\HireMe\Traits\TcaItemsTrait;

/**
 * Represents logical operators (AND, OR, NOT) for database queries
 *
 * @category Enum
 * @package  CpCompartner\Blog\Enum\General
 * @license  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @link     TODO
 */
enum LogicalOperatorEnum: int
{
    use TcaItemsTrait;

    case OR = 0;
    case AND = 1;
    case NOT = 2;

    const EXT_LANGUAGE_FILE_PATH = 'LLL:EXT:hire_me/Resources/Private/Language/locallang_db.xlf';
    const LABEL_KEY = 'enum.logical_operator';
}
