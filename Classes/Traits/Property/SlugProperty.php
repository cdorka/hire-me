<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;


trait SlugProperty
{
    protected ?string $slug = null;

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }
}
