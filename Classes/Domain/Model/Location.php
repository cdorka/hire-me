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

use ChristianDorka\HireMe\Domain\Trait\AddressProperties;
use ChristianDorka\HireMe\Domain\Trait\JobPostings;
use ChristianDorka\HireMe\Domain\Trait\SystemProperties;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
class Location extends AbstractDomainObject
{
    use SystemProperties;
    use AddressProperties;
    use JobPostings;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
    }
}
