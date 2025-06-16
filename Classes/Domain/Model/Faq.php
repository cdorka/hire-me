<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\Model;

use ChristianDorka\HireMe\Traits\Properties\SystemProperties;
use ChristianDorka\HireMe\Traits\Property\DescriptionProperty;
use ChristianDorka\HireMe\Traits\Property\SlugProperty;
use ChristianDorka\HireMe\Traits\Property\TitleProperty;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

/**
 * FAQ domain model
 *
 * @package ChristianDorka\HireMe\Domain\Model
 * @author Christian Dorka
 */
class Faq extends AbstractDomainObject implements FaqItemInterface
{
    use SystemProperties;
    use TitleProperty;
    use SlugProperty;
    use DescriptionProperty;

    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Get fully qualified class name for template switching
     *
     * @return string The fully qualified class name
     * @noinspection PhpUnused
     */
    public function getToString(): string
    {
        return static::class;
    }
}
