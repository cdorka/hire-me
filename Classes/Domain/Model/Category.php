<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Model;

use ChristianDorka\HireMe\Traits\Properties\SystemProperties;
use ChristianDorka\HireMe\Traits\Property\DescriptionProperty;
use ChristianDorka\HireMe\Traits\Property\IconProperty;
use ChristianDorka\HireMe\Traits\Property\JobPostingsProperty;
use ChristianDorka\HireMe\Traits\Property\ParentCategoryProperty;
use ChristianDorka\HireMe\Traits\Property\SlugProperty;
use ChristianDorka\HireMe\Traits\Property\TitleProperty;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Custom category domain model
 *
 * @package ChristianDorka\HireMe\Domain\Model
 * @author Christian Dorka
 */
class Category extends AbstractDomainObject
{
    use SystemProperties;
    use TitleProperty;
    use SlugProperty;
    use DescriptionProperty;
    use IconProperty;
    use JobPostingsProperty;
    use ParentCategoryProperty;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobPostings = new ObjectStorage();
    }
}
