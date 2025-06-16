<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Properties;

use ChristianDorka\HireMe\Enum\Job\ApplicationType;

trait JobPostingApplicationProperties
{
    protected ?int $applicationType = null;
    protected ?string $applicationEmail = null;
    protected ?string $applicationLink = null;
    protected ?string $applicationForm = null;

    public function getApplicationType(): ?ApplicationType
    {
        if ($this->applicationType === null) {
            return null;
        }

        return ApplicationType::tryFrom($this->applicationType);
    }

    public function setApplicationType(?int $applicationType): void
    {
        $this->applicationType = $applicationType;
    }

    public function getApplicationEmail(): ?string
    {
        return $this->applicationEmail;
    }

    public function setApplicationEmail(?string $applicationEmail): void
    {
        $this->applicationEmail = $applicationEmail;
    }

    public function getApplicationLink(): ?string
    {
        return $this->applicationLink;
    }

    public function setApplicationLink(?string $applicationLink): void
    {
        $this->applicationLink = $applicationLink;
    }

    public function getApplicationForm(): ?string
    {
        return $this->applicationForm;
    }

    public function setApplicationForm(?string $applicationForm): void
    {
        $this->applicationForm = $applicationForm;
    }

    public function getRenderApplication(): bool {
        return $this->applicationType !== ApplicationType::NONE->value ?? false;
    }

}
