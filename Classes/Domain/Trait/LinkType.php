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
use ChristianDorka\HireMe\Enum\Url\UrlTypeEnum;
use DateTime;
use RuntimeException;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
trait LinkType
{
    protected ?int $linkType = null;

    public function getLinkType(): ?int
    {
        return $this->linkType;
    }

    public function setLinkType(?int $linkType): self
    {
        if ($linkType === null) {
            $this->linkType = null;
            return $this;
        }
        if (is_int($linkType)) {
            $this->linkType = UrlTypeEnum::tryFrom($linkType)->value;
            return $this;
        }

        throw new RuntimeException('', 5);
    }
}
