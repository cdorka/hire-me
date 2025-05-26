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

use ChristianDorka\HireMe\Domain\Trait\DescriptionProperty;
use ChristianDorka\HireMe\Domain\Trait\IconProperty;
use ChristianDorka\HireMe\Domain\Trait\JobPostingsProperty;
use ChristianDorka\HireMe\Domain\Trait\ParentCategory;
use ChristianDorka\HireMe\Domain\Trait\SlugProperty;
use ChristianDorka\HireMe\Domain\Trait\SystemProperties;
use ChristianDorka\HireMe\Domain\Trait\TitleProperty;
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
class Category extends AbstractDomainObject
{
    use SystemProperties;
    use TitleProperty;
    use SlugProperty;
    use DescriptionProperty;
    use IconProperty;
    use JobPostingsProperty;
    use ParentCategory;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->jobPostings = new ObjectStorage();
    }
}
