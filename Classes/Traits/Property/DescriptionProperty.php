<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;


trait DescriptionProperty
{
    protected ?string $description = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

}
