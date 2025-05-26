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

use ChristianDorka\HireMe\Domain\Model\Url;
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
trait Urls
{
    /**
     * @var ObjectStorage<Url>|null
     */
    protected ?ObjectStorage $urls = null;

    /**
     * @param ObjectStorage<Url>|null $urls
     *
     * @return self
     */
    public function setUrls(?ObjectStorage $urls): self
    {
        $this->urls = $urls;
        return $this;
    }

    /**
     * Add a url to the storage
     *
     * @param Url $url
     *
     * @return self
     */
    public function addUrl(Url $url): self
    {
        $this->urls->attach($url);
        return $this;
    }

    /**
     * Remove a url from the storage
     *
     * @param Url $url
     *
     * @return self
     */
    public function removeUrl(Url $url): self
    {
        $this->urls->detach($url);
        return $this;
    }

    /**
     * Remove all urls from the storage
     *
     * @return self
     */
    public function removeAllUrls(): self
    {
        $this->urls = new ObjectStorage();
        return $this;
    }

    /**
     * Remove all urls from the storage
     *
     * @return null|array
     */
    public function getUrls(): ?array
    {
        return $this->urls?->toArray();
    }
}
