<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\JobPosting;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait JobPostingsProperty
{
    /**
     * @var ObjectStorage<JobPosting>|null
     */
    protected ?ObjectStorage $jobPostings = null;

    /**
     * Add a jobPosting to the storage
     *
     * @param JobPosting $jobPosting
     *
     * @return void
     */
    public function addJobPosting(JobPosting $jobPosting): void
    {
        $this->jobPostings->attach($jobPosting);
    }

    /**
     * Remove a jobPosting from the storage
     *
     * @param JobPosting $jobPosting
     *
     * @return void
     */
    public function removeJobPosting(JobPosting $jobPosting): void
    {
        $this->jobPostings->detach($jobPosting);
    }

    /**
     * Remove all jobPostings from the storage
     *
     * @return void
     */
    public function removeAllJobPostings(): void
    {
        $this->jobPostings = new ObjectStorage();
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

    /**
     * @param ObjectStorage<JobPosting>|null $jobPostings
     *
     * @return void
     */
    public function setJobPostings(?ObjectStorage $jobPostings): void
    {
        $this->jobPostings = $jobPostings;
    }
}
