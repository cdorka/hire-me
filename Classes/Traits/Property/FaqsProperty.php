<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Traits\Property;

use ChristianDorka\HireMe\Domain\Model\Faq;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

trait FaqsProperty
{
    /**
     * @var ObjectStorage<Faq>|null
     */
    protected ?ObjectStorage $faqs = null;

    /**
     * @param Faq $faq
     *
     * @return void
     */
    public function addFaq(Faq $faq): void
    {
        if ($this->faqs === null) {
            $this->faqs = new ObjectStorage();
        }
        $this->faqs->attach($faq);
    }

    /**
     * @param Faq $faq
     *
     * @return void
     */
    public function removeFaq(Faq $faq): void
    {
        if ($this->faqs !== null) {
            $this->faqs->detach($faq);
        }
    }

    /**
     * @return void
     */
    public function removeAllFaq(): void
    {
        $this->faqs = new ObjectStorage();
    }

    /**
     * @return ObjectStorage<Faq>|null
     */
    public function getFaqs(): ?ObjectStorage
    {
        return $this->faqs;
    }

    /**
     * @param ObjectStorage<Faq>|null $faqs
     *
     * @return void
     */
    public function setFaqs(?ObjectStorage $faqs): void
    {
        $this->faqs = $faqs;
    }

    /**
     * @return array<Faq>
     */
    public function getFaqArray(): array
    {
        return $this->faqs?->toArray() ?? [];
    }
}
