<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Properties;

use DateTime;


trait ApplicationProperties
{
    protected ?string $intro = null;
    protected ?string $teaser = null;
    protected ?string $educationRequirementsText = null;
    protected ?string $experienceRequirementsText = null;
    protected ?string $eligibilityToWorkRequirement = null;
    protected ?string $responsibilities = null;
    protected ?string $qualifications = null;
    protected ?string $skills = null;
    protected ?string $workingHours = null;

    protected ?DateTime $starttime = null;
    protected ?DateTime $validThrough = null;
    protected bool $jobImmediateStart = false;
    protected ?DateTime $jobStartDate = null;
    protected bool $hasDirectApply = false;

    protected ?DateTime $newtime = null;

    protected ?DateTime $toptime = null;
    protected ?string $jobId = null;

    public function getToptime(): ?DateTime
    {
        return $this->toptime;
    }

    public function setToptime(?DateTime $toptime): void
    {
        $this->toptime = $toptime;
    }

    public function getEligibilityToWorkRequirement(): ?string
    {
        return $this->eligibilityToWorkRequirement;
    }

    public function setEligibilityToWorkRequirement(?string $eligibilityToWorkRequirement): void
    {
        $this->eligibilityToWorkRequirement = $eligibilityToWorkRequirement;
    }

    public function getExperienceRequirementsText(): ?string
    {
        return $this->experienceRequirementsText;
    }

    public function setExperienceRequirementsText(?string $experienceRequirementsText): void
    {
        $this->experienceRequirementsText = $experienceRequirementsText;
    }

    public function getResponsibilities(): ?string
    {
        return $this->responsibilities;
    }

    public function setResponsibilities(?string $responsibilities): void
    {
        $this->responsibilities = $responsibilities;
    }

    public function getEducationRequirementsText(): ?string
    {
        return $this->educationRequirementsText;
    }

    public function setEducationRequirementsText(?string $educationRequirementsText): void
    {
        $this->educationRequirementsText = $educationRequirementsText;
    }

    public function getQualifications(): ?string
    {
        return $this->qualifications;
    }

    public function setQualifications(?string $qualifications): void
    {
        $this->qualifications = $qualifications;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(?string $skills): void
    {
        $this->skills = $skills;
    }

    public function getWorkingHours(): ?string
    {
        return $this->workingHours;
    }

    public function setWorkingHours(?string $workingHours): void
    {
        $this->workingHours = $workingHours;
    }

    /** if is it still top */
    public function isTop(): bool
    {
        if ($this->toptime === null) {
            return false;
        }

        return new DateTime() <= time();
    }

    public function getNewtime(): ?DateTime
    {
        return $this->newtime;
    }

    public function setNewtime(?DateTime $newtime): void
    {
        $this->newtime = $newtime;
    }

    public function getIntro(): ?string
    {
        return $this->intro;
    }

    public function setIntro(?string $intro): void
    {
        $this->intro = $intro;
    }

    public function getTeaser(): ?string
    {
        return $this->teaser;
    }

    public function setTeaser(?string $teaser): void
    {
        $this->teaser = $teaser;
    }

    /** if is it still new */
    public function isNew(): bool
    {
        if ($this->newtime === null) {
            return false;
        }

        return new DateTime() <= time();
    }

    public function getStarttime(): ?DateTime
    {
        return $this->starttime;
    }

    public function setStarttime(?DateTime $starttime): void
    {
        $this->starttime = $starttime;
    }

    public function getValidThrough(): ?DateTime
    {
        return $this->validThrough;
    }

    public function setValidThrough(?DateTime $validThrough): void
    {
        $this->validThrough = $validThrough;
    }

    public function getJobImmediateStart(): bool
    {
        return $this->jobImmediateStart;
    }

    public function setJobImmediateStart(bool $jobImmediateStart): void
    {
        $this->jobImmediateStart = $jobImmediateStart;
    }

    public function getJobStartDate(): ?DateTime
    {
        return $this->jobStartDate;
    }

    public function setJobStartDate(?DateTime $jobStartDate): void
    {
        $this->jobStartDate = $jobStartDate;
    }

    public function getHasDirectApply(): bool
    {
        return $this->hasDirectApply;
    }

    public function setHasDirectApply(bool $hasDirectApply): void
    {
        $this->hasDirectApply = $hasDirectApply;
    }

    public function getJobId(): ?string
    {
        return $this->jobId;
    }

    public function setJobId(?string $jobId): void
    {
        $this->jobId = $jobId;
    }


}
