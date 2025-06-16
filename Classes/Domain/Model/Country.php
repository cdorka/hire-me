<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Model;

use ChristianDorka\HireMe\Traits\Properties\CountryProperties;
use ChristianDorka\HireMe\Traits\Properties\SystemProperties;
use ChristianDorka\HireMe\Traits\Property\SlugProperty;
use ChristianDorka\HireMe\Traits\Property\TitleProperty;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

/**
 * Country domain model
 *
 * @package ChristianDorka\HireMe\Domain\Model
 * @author Christian Dorka
 */
class Country extends AbstractDomainObject
{
    use SystemProperties;
    use TitleProperty;
    use SlugProperty;
    use CountryProperties;

    /**
     * Constructor
     */
    public function __construct()
    {
    }
}
