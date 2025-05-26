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

use ChristianDorka\HireMe\Domain\Trait\DetailPageProperty;
use ChristianDorka\HireMe\Domain\Trait\HomepageProperty;
use ChristianDorka\HireMe\Domain\Trait\LegalNameProperty;
use ChristianDorka\HireMe\Domain\Trait\LogoProperty;
use ChristianDorka\HireMe\Domain\Trait\SlugProperty;
use ChristianDorka\HireMe\Domain\Trait\SystemProperties;
use ChristianDorka\HireMe\Domain\Trait\TitleProperty;
use ChristianDorka\HireMe\Domain\Trait\UrlsProperty;
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
