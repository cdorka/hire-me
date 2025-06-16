<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Model;

use ChristianDorka\HireMe\Traits\Properties\AddressProperties;
use ChristianDorka\HireMe\Traits\Properties\SystemProperties;
use ChristianDorka\HireMe\Traits\Property\JobPostingsProperty;
use ChristianDorka\HireMe\Traits\Property\TitleProperty;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

/**
 * Location domain model
 *
 * @package ChristianDorka\HireMe\Domain\Model
 * @author Christian Dorka
 */
class Location extends AbstractDomainObject
{
    use SystemProperties;
    use TitleProperty;
    use AddressProperties;
    use JobPostingsProperty;

    /**
     * Constructor
     */
    public function __construct()
    {
    }
}
