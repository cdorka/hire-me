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

namespace ChristianDorka\HireMe\Domain\Trait;

use ChristianDorka\HireMe\Domain\Model\Category;
use ChristianDorka\HireMe\Domain\Model\Country;
use DateTime;
use RuntimeException;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * TODO
 *
 * @category TODO
 * @package  TODO
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  TODO
 * @link     TODO
 */
trait ApplicationProperties
{
    protected ?DateTime $starttime = null;
    protected ?DateTime $validThrough = null;
    protected bool $jobImmediateStart = false;
    protected ?DateTime $jobStartDate = null;
    protected bool $hasDirectApply = false;

    public function getStarttime(): ?DateTime
    {
        return $this->starttime;
    }

    public function setStarttime(?DateTime $starttime): ApplicationProperties
    {
        $this->starttime = $starttime;
        return $this;
    }

    public function getValidThrough(): ?DateTime
    {
        return $this->validThrough;
    }

    public function setValidThrough(?DateTime $validThrough): ApplicationProperties
    {
        $this->validThrough = $validThrough;
        return $this;
    }

    public function getJobImmediateStart(): bool
    {
        return $this->jobImmediateStart;
    }

    public function setJobImmediateStart(bool $jobImmediateStart): ApplicationProperties
    {
        $this->jobImmediateStart = $jobImmediateStart;
        return $this;
    }

    public function getJobStartDate(): ?DateTime
    {
        return $this->jobStartDate;
    }

    public function setJobStartDate(?DateTime $jobStartDate): ApplicationProperties
    {
        $this->jobStartDate = $jobStartDate;
        return $this;
    }

    public function getHasDirectApply(): bool
    {
        return $this->hasDirectApply;
    }

    public function setHasDirectApply(bool $hasDirectApply): ApplicationProperties
    {
        $this->hasDirectApply = $hasDirectApply;
        return $this;
    }


}
