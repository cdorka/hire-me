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

use ChristianDorka\HireMe\Domain\Trait\Homepage;
use ChristianDorka\HireMe\Domain\Trait\LegalName;
use ChristianDorka\HireMe\Domain\Trait\LogoProperty;
use ChristianDorka\HireMe\Domain\Trait\SlugProperty;
use ChristianDorka\HireMe\Domain\Trait\SystemProperties;
use ChristianDorka\HireMe\Domain\Trait\TitleProperty;
use ChristianDorka\HireMe\Domain\Trait\Urls;
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
    use SlugProperty;
    use LegalName;
    use Homepage;
    use Urls;
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
