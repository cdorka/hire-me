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
     * @param Url $url
     *
     * @return void
     */
    public function addUrl(Url $url): void
    {
        if ($this->urls === null) {
            $this->urls = new ObjectStorage();
        }
        $this->urls->attach($url);
    }

    /**
     * @param Url $url
     *
     * @return void
     */
    public function removeUrl(Url $url): void
    {
        if ($this->urls !== null) {
            $this->urls->detach($url);
        }
    }

    /**
     * @return void
     */
    public function removeAllUrl(): void
    {
        $this->urls = new ObjectStorage();
    }

    /**
     * @return ObjectStorage<Url>|null
     */
    public function getUrls(): ?ObjectStorage
    {
        return $this->urls;
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

    /**
     * @return array<Url>
     */
    public function getUrlArray(): array
    {
        return $this->urls?->toArray() ?? [];
    }
}
