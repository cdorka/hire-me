<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;


use TYPO3\CMS\Core\Utility\GeneralUtility;

trait CareerLevelsProperty
{
    /**
     * @var string|null
     */
    protected ?string $careerLevels = null;

    public function getCareerLevels(): ?array
    {
        if ($this->careerLevels === null) {
            return null;
        }

        return GeneralUtility::intExplode(',', $this->careerLevels, true);
    }

    public function setCareerLevels(?string $careerLevels): void
    {
        $this->careerLevels = $careerLevels;
    }
}
