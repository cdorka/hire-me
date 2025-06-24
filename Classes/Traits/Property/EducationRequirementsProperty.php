<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Trait für die Eigenschaft des erforderlichen Bildungsgrads für eine Stellenausschreibung.
 */
trait EducationRequirementsProperty
{
    /**
     * @var string|null
     */
    protected ?string $educationRequirements = null;

    /**
     * Getter der die Educational Requirements als enums anstelle eines imploded strings returned
     * @return array<int>|null
     */
    public function getEducationRequirements(): ?array
    {
        if ($this->educationRequirements === null) {
            return null;
        }


        return GeneralUtility::intExplode(',', $this->educationRequirements, true);
    }

    /**
     * Getter der den eigentlich gespeicherten werden aus der DB für Educational Requirements returned
     *
     * @return string|null
     */
    public function getRawEducationRequirements(): ?string
    {
        return $this->educationRequirements;
    }

    public function setEducationRequirements(?string $educationRequirements): void
    {
        $this->educationRequirements = $educationRequirements;
    }
}
