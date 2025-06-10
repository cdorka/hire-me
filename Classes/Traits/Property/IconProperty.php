<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;


trait IconProperty
{
    protected ?FileReference $icon = null;

    public function getIcon(): ?FileReference
    {
        return $this->icon;
    }

    public function setIcon(?FileReference $icon): void
    {
        $this->icon = $icon;
    }
}
