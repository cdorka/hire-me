<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Properties;

use ChristianDorka\HireMe\Enum\Salary\SalaryCurrency;
use ChristianDorka\HireMe\Enum\Salary\SalaryType;
use ChristianDorka\HireMe\Enum\Salary\SalaryUnit;


trait SalaryProperties
{
    protected ?bool $hasBaseSalary = null;
    protected ?int $baseSalaryType = null;
    protected ?float $baseSalary = null;
    protected ?float $baseSalaryMin = null;
    protected ?float $baseSalaryMax = null;
    protected ?int $baseSalaryUnit = null;
    protected ?int $baseSalaryCurrency = null;

    public function getHasBaseSalary(): ?bool
    {
        return $this->hasBaseSalary;
    }

    public function setHasBaseSalary(?bool $hasBaseSalary): void
    {
        $this->hasBaseSalary = $hasBaseSalary;
    }

    public function getBaseSalaryType(): ?SalaryType
    {
        return SalaryType::tryFrom($this->baseSalaryType);
    }

    public function setBaseSalaryType(?int $baseSalaryType): void
    {
        $this->baseSalaryType = $baseSalaryType;
    }

    public function getBaseSalary(): ?float
    {
        return $this->baseSalary;
    }

    public function setBaseSalary(?float $baseSalary): void
    {
        $this->baseSalary = $baseSalary;
    }

    public function getBaseSalaryMin(): ?float
    {
        return $this->baseSalaryMin;
    }

    public function setBaseSalaryMin(?float $baseSalaryMin): void
    {
        $this->baseSalaryMin = $baseSalaryMin;
    }

    public function getBaseSalaryMax(): ?float
    {
        return $this->baseSalaryMax;
    }

    public function setBaseSalaryMax(?float $baseSalaryMax): void
    {
        $this->baseSalaryMax = $baseSalaryMax;
    }

    public function getBaseSalaryUnit(): ?SalaryUnit
    {
        return SalaryUnit::tryFrom($this->baseSalaryUnit);
    }

    public function setBaseSalaryUnit(?int $baseSalaryUnit): void
    {
        $this->baseSalaryUnit = $baseSalaryUnit;
    }

    public function getBaseSalaryCurrency(): ?SalaryCurrency
    {
        return SalaryCurrency::tryFrom($this->baseSalaryCurrency);
    }

    public function setBaseSalaryCurrency(?int $baseSalaryCurrency): void
    {
        $this->baseSalaryCurrency = $baseSalaryCurrency;
    }
}
