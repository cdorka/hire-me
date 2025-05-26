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

namespace ChristianDorka\HireMe\Domain\Trait;

use ChristianDorka\HireMe\Domain\Model\Category;
use RuntimeException;
use TYPO3\CMS\Core\Resource\FileReference;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
trait LogoProperty
{
    protected ?FileReference $logo = null;

    public function getLogo(): ?FileReference
    {
        return $this->logo;
    }

    public function setLogo(?FileReference $logo): self
    {
        $this->logo = $logo;
        return $this;
    }
}
