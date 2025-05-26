<?php

declare(strict_types=1);

namespace ChristianDorka\HireMe\UserFunction\FormEngine;

use ChristianDorka\HireMe\Enum\SocialMedia\TwitterCard;

class SeoItemsProcFunc
{
    public function twitterCardItemsProcFunc(array &$params) : void {
        $params['items'] = TwitterCard::getTcaItems();
    }
}
