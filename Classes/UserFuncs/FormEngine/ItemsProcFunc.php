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

namespace ChristianDorka\HireMe\UserFuncs\FormEngine;

use ChristianDorka\HireMe\Enum\Url\UrlTypeEnum;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
class ItemsProcFunc
{
    public function urlTypeItems(&$params): void
    {
        $params['items'] = UrlTypeEnum::getTcaItems();
    }
}
