<?php

/**
 * TODO
 * php version 8.2
 *
 * @category     TODO
 * @package      TODO
 * @license      TODO
 * @author       Christian Dorka <mail@christiandorka.de>
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Properties;

use ChristianDorka\HireMe\Domain\Model\Category;
use ChristianDorka\HireMe\Enum\Salary\SalaryCurrency;
use ChristianDorka\HireMe\Enum\Salary\SalaryType;
use ChristianDorka\HireMe\Enum\Salary\SalaryUnit;
use DateTime;
use RuntimeException;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
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

    public function setHasBaseSalary(?bool $hasBaseSalary): self
    {
        $this->hasBaseSalary = $hasBaseSalary;
        return $this;
    }

    public function getBaseSalaryType(): ?SalaryType
    {
        return SalaryType::tryFrom($this->baseSalaryType);
    }

    public function setBaseSalaryType(?int $baseSalaryType): self
    {
        $this->baseSalaryType = $baseSalaryType;
        return $this;
    }

    public function getBaseSalary(): ?float
    {
        return $this->baseSalary;
    }

    public function setBaseSalary(?float $baseSalary): self
    {
        $this->baseSalary = $baseSalary;
        return $this;
    }

    public function getBaseSalaryMin(): ?float
    {
        return $this->baseSalaryMin;
    }

    public function setBaseSalaryMin(?float $baseSalaryMin): self
    {
        $this->baseSalaryMin = $baseSalaryMin;
        return $this;
    }

    public function getBaseSalaryMax(): ?float
    {
        return $this->baseSalaryMax;
    }

    public function setBaseSalaryMax(?float $baseSalaryMax): self
    {
        $this->baseSalaryMax = $baseSalaryMax;
        return $this;
    }

    public function getBaseSalaryUnit(): ?SalaryUnit
    {
        return SalaryUnit::tryFrom($this->baseSalaryUnit);
    }

    public function setBaseSalaryUnit(?int $baseSalaryUnit): self
    {
        $this->baseSalaryUnit = $baseSalaryUnit;
        return $this;
    }

    public function getBaseSalaryCurrency(): ?SalaryCurrency
    {
        return SalaryCurrency::tryFrom($this->baseSalaryCurrency);
    }

    public function setBaseSalaryCurrency(?int $baseSalaryCurrency): self
    {
        $this->baseSalaryCurrency = $baseSalaryCurrency;
        return $this;
    }
}
