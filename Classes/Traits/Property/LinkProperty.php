<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;


trait LinkProperty
{
    protected ?string $link = null;

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): void
    {
        $this->link = $link;
    }

}
