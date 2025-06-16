<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\UserFuncs\FormEngine;

use ChristianDorka\HireMe\Enum\SocialMedia\TwitterCard;

class SeoItemsProcFunc
{
    /**
     * ItemsProcFunc for twitter_card field
     */
    public function twitterCardItemsProcFunc(array &$params) : void {
        $params['items'] = TwitterCard::getTcaItems();
    }
}
