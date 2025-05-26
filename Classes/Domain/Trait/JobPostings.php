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

use ChristianDorka\HireMe\Domain\Model\JobPosting;
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
trait JobPostings
{
    /**
     * @var ObjectStorage<JobPosting>|null
     */
    protected ?ObjectStorage $jobPostings = null;

    /**
     * @param ObjectStorage<JobPosting>|null $jobPostings
     *
     * @return self
     */
    public function setJobPostings(?ObjectStorage $jobPostings): self
    {
        $this->jobPostings = $jobPostings;
        return $this;
    }

    /**
     * Add a jobPosting to the storage
     *
     * @param JobPosting $jobPosting
     *
     * @return self
     */
    public function addJobPosting(JobPosting $jobPosting): self
    {
        $this->jobPostings->attach($jobPosting);
        return $this;
    }

    /**
     * Remove a jobPosting from the storage
     *
     * @param JobPosting $jobPosting
     *
     * @return self
     */
    public function removeJobPosting(JobPosting $jobPosting): self
    {
        $this->jobPostings->detach($jobPosting);
        return $this;
    }

    /**
     * Remove all jobPostings from the storage
     *
     * @return self
     */
    public function removeAllJobPostings(): self
    {
        $this->jobPostings = new ObjectStorage();
        return $this;
    }

    /**
     * Remove all jobPostings from the storage
     *
     * @return null|array
     */
    public function getJobPostings(): ?array
    {
        return $this->jobPostings?->toArray();
    }
}
