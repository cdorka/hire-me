<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Properties;


trait CountryProperties
{
    protected ?string $twoLetterIsoCode = null;
    protected ?string $threeLetterIsoCode = null;

    public function getTwoLetterIsoCode(): ?string
    {
        return $this->twoLetterIsoCode;
    }

    public function setTwoLetterIsoCode(?string $twoLetterIsoCode): void
    {
        $this->twoLetterIsoCode = $twoLetterIsoCode;
    }

    public function getThreeLetterIsoCode(): ?string
    {
        return $this->threeLetterIsoCode;
    }

    public function setThreeLetterIsoCode(?string $threeLetterIsoCode): void
    {
        $this->threeLetterIsoCode = $threeLetterIsoCode;
    }
}
