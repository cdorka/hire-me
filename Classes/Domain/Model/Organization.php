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

namespace ChristianDorka\HireMe\Domain\Model;

use ChristianDorka\HireMe\Traits\Properties\SystemProperties;
use ChristianDorka\HireMe\Traits\Property\DetailPageProperty;
use ChristianDorka\HireMe\Traits\Property\HomepageProperty;
use ChristianDorka\HireMe\Traits\Property\LegalNameProperty;
use ChristianDorka\HireMe\Traits\Property\LogoProperty;
use ChristianDorka\HireMe\Traits\Property\SlugProperty;
use ChristianDorka\HireMe\Traits\Property\TitleProperty;
use ChristianDorka\HireMe\Traits\Property\UrlsProperty;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
class Organization extends AbstractDomainObject
{
    use SystemProperties;
    use TitleProperty;
    use LegalNameProperty;
    use SlugProperty;
    use HomepageProperty;
    use UrlsProperty;
    use DetailPageProperty;
    use LogoProperty;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->urls = new ObjectStorage();
    }
}
