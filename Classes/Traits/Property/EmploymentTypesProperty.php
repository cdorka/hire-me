<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;


use TYPO3\CMS\Core\Utility\GeneralUtility;

trait EmploymentTypesProperty
{
    /**
     * @var string|null
     */
    protected ?string $employmentTypes = null;

    public function getEmploymentTypes(): ?array
    {
        if ($this->employmentTypes === null) {
            return null;
        }

        return GeneralUtility::intExplode(',', $this->employmentTypes, true);
    }

    public function setEmploymentTypes(?string $employmentTypes): void
    {
        $this->employmentTypes = $employmentTypes;
    }

}
