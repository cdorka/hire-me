<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Domain\DTO;

use ChristianDorka\HireMe\Domain\Model\Organization;
use ChristianDorka\HireMe\Domain\Model\Scope;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;

/**
 * Content Element Model for tt_content
 */
class TtContentSource extends AbstractEntity
{
    /**
     * Constructor
     */
    public function __construct()
    {
    }
}
