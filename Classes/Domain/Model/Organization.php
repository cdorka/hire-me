<?php
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

/**
 * Organization domain model
 *
 * @package ChristianDorka\HireMe\Domain\Model
 * @author Christian Dorka
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

    /**
     * Constructor
     */
    public function __construct()
    {
    }
}
