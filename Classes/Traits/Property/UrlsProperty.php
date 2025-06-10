<?php


declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Url;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


trait UrlsProperty
{
    /**
     * @var ObjectStorage<Url>|null
     */
    protected ?ObjectStorage $urls = null;

    /**
     * Add a url to the storage
     *
     * @param Url $url
     *
     * @return void
     */
    public function addUrl(Url $url): void
    {
        $this->urls->attach($url);
    }

    /**
     * Remove a url from the storage
     *
     * @param Url $url
     *
     * @return void
     */
    public function removeUrl(Url $url): void
    {
        $this->urls->detach($url);
    }

    /**
     * Remove all urls from the storage
     *
     * @return void
     */
    public function removeAllUrls(): void
    {
        $this->urls = new ObjectStorage();
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

    /**
     * @param ObjectStorage<Url>|null $urls
     *
     * @return void
     */
    public function setUrls(?ObjectStorage $urls): void
    {
        $this->urls = $urls;
    }
}
