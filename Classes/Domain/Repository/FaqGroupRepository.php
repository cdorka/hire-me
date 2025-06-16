<?php

namespace ChristianDorka\HireMe\Domain\Repository;

// FAQ Group Repository
class FaqGroupRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function initializeObject(): void
    {
        $querySettings = $this->createQuery()->getQuerySettings();
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }
}
