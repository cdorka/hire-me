<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Enum\Url\UrlTypeEnum;
use RuntimeException;


trait LinkTypeProperty
{
    protected ?int $linkType = null;

    public function getLinkType(): ?int
    {
        return $this->linkType;
    }

    public function setLinkType(?int $linkType): void
    {
        if ($linkType === null) {
            $this->linkType = null;
        }
        if (is_int($linkType)) {
            $this->linkType = UrlTypeEnum::tryFrom($linkType)->value;
        }

        throw new RuntimeException('', 5);
    }
}
