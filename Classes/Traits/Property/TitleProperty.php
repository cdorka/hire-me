<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;


trait TitleProperty
{
    protected ?string $title = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

}
