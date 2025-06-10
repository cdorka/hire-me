<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;


trait LogoProperty
{
    protected ?FileReference $logo = null;

    public function getLogo(): ?FileReference
    {
        return $this->logo;
    }

    public function setLogo(?FileReference $logo): void
    {
        $this->logo = $logo;
    }
}
