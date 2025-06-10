<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;


trait LegalNameProperty
{
    protected ?string $legalName = null;

    public function getLegalName(): ?string
    {
        return $this->legalName;
    }

    public function setLegalName(?string $legalName): void
    {
        $this->legalName = $legalName;
    }

}
