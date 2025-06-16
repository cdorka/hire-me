<?php

namespace ChristianDorka\HireMe\Domain\Repository;

class FaqRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function initializeObject(): void
    {
        $querySettings = $this->createQuery()->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }
}
