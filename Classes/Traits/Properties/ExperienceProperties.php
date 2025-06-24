<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Properties;

trait ExperienceProperties
{
    protected string $experienceRequirements = '';
    protected ?int $experienceRequirementsMonth = null;
    protected ?bool $acceptsEducationOrExperience = null;

    public function getExperienceRequirements(): string
    {
        return $this->experienceRequirements;
    }

    public function setExperienceRequirements(?string $experienceRequirements = null): void
    {
        $this->experienceRequirements = ($experienceRequirements !== null) ? $experienceRequirements : '';
    }

    public function getExperienceRequirementsMonth(): ?int
    {
        return $this->experienceRequirementsMonth;
    }

    public function setExperienceRequirementsMonth(?int $experienceRequirementsMonth): void
    {
        $this->experienceRequirementsMonth = $experienceRequirementsMonth;
    }

    public function getAcceptsEducationOrExperience(): ?bool
    {
        return $this->acceptsEducationOrExperience;
    }

    public function setAcceptsEducationOrExperience(?bool $acceptsEducationOrExperience): void
    {
        $this->acceptsEducationOrExperience = $acceptsEducationOrExperience;
    }
}
