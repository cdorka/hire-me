<?php

/**
 * Job Posting Page Title Provider
 * php version 8.2
 *
 * @category     PageTitle
 * @package      ChristianDorka\HireMe\PageTitle
 * @license      GPL-3.0-or-later
 * @author       Christian Dorka <mail@christiandorka.de>
 * @noinspection PhpUnused
 */

declare(strict_types=1);

namespace ChristianDorka\HireMe\PageTitle;

use TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider;

/**
 * Title provider for job posting pages
 * Sets the page title for job posting detail pages
 *  <code>
 *  // Usage example ...
 *
 *  use ChristianDorka\HireMe\PageTitle\JobPostingRepository;
 *
 *  public function __construct(
 *      protected readonly JobPostingRepository $jobPostingRepository
 *  ) {}
 *
 *  // Generate title fpr blog
 *  $this->jobPostingTitleProvider->setTitle($jobPosting->getSeoTitle() ?: $jobPosting->getTitle());
 *  </code>
 *
 * @category PageTitle
 * @package  ChristianDorka\HireMe\PageTitle
 * @author   Christian Dorka <mail@christiandorka.de>
 * @license  GPL-3.0-or-later
 */
final class JobPostingTitleProvider extends AbstractPageTitleProvider
{
    /**
     * Sets the title for the page
     *
     * @param string $title The title to be set
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
}
