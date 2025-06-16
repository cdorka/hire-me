<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Model;

use ChristianDorka\HireMe\Traits\Properties\SystemProperties;
use ChristianDorka\HireMe\Traits\Property\LinkProperty;
use ChristianDorka\HireMe\Traits\Property\LinkTypeProperty;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

/**
 * Url domain model
 *
 * @package ChristianDorka\HireMe\Domain\Model
 * @author Christian Dorka
 */
class Url extends AbstractDomainObject
{
    use SystemProperties;
    use LinkProperty;
    use LinkTypeProperty;

    /**
     * Constructor
     */
    public function __construct()
    {
    }
}
