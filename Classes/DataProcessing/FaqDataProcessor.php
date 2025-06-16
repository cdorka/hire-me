<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\DataProcessing;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use ChristianDorka\HireMe\Domain\Repository\FaqRepository;
use ChristianDorka\HireMe\Domain\Repository\FaqGroupRepository;
use ChristianDorka\HireMe\Domain\Model\FaqItemInterface;

/**
 * DataProcessor to resolve FAQ references from group fields
 *
 * TypoScript Example:
 * dataProcessing {
 *   10 = ChristianDorka\HireMe\DataProcessing\FaqDataProcessor
 *   10 {
 *     # Field containing the FAQ references (comma-separated)
 *     referenceField = faqs
 *     # Target variable name in Fluid template
 *     as = resolvedFaqs
 *   }
 * }
 */
class FaqDataProcessor implements DataProcessorInterface
{
    /**
     * Process data for FAQ resolution
     *
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ): array {
        // Configuration options
        $referenceField = $processorConfiguration['referenceField'] ?? 'faqs';
        $targetVariableName = $processorConfiguration['as'] ?? 'resolvedFaqs';
        $respectSorting = (bool)($processorConfiguration['respectSorting'] ?? true);

        // Get the FAQ references from the current record
        $faqReferences = '';

        // Try to get from processedData first (e.g., from previous processors)
        if (isset($processedData['data'][$referenceField])) {
            $faqReferences = (string)$processedData['data'][$referenceField];
        }
        // Fallback to cObj data
        elseif (isset($cObj->data[$referenceField])) {
            $faqReferences = (string)$cObj->data[$referenceField];
        }

        // Resolve FAQ objects
        $resolvedFaqs = $this->resolveFaqReferences($faqReferences);

        // Apply sorting if configured
        if ($respectSorting && !empty($resolvedFaqs)) {
            $resolvedFaqs = $this->applySorting($resolvedFaqs);
        }

        // Add resolved FAQs to processed data
        $processedData[$targetVariableName] = $resolvedFaqs;

        return $processedData;
    }

    /**
     * Resolve FAQ references from group field format
     * Input format: "tx_hireme_faq_123,tx_hireme_faqgroup_456"
     *
     * @return array<FaqItemInterface>
     */
    public function resolveFaqReferences(string $faqReferences): array
    {
        $faqObjects = [];

        if (empty($faqReferences)) {
            return $faqObjects;
        }

        // Get repositories using GeneralUtility::makeInstance
        /** @var FaqRepository $faqRepository */
        $faqRepository = GeneralUtility::makeInstance(FaqRepository::class);
        /** @var FaqGroupRepository $faqGroupRepository */
        $faqGroupRepository = GeneralUtility::makeInstance(FaqGroupRepository::class);

        $references = GeneralUtility::trimExplode(',', $faqReferences, true);

        foreach ($references as $reference) {
            // Split the reference into table and uid
            // Expected format: "tx_hireme_faq_2"
            $parts = explode('_', $reference);

            if (count($parts) < 2) {
                continue;
            }

            // The UID is the last part
            $uid = (int)array_pop($parts);
            // The table name is everything else joined back
            $table = implode('_', $parts);

            if ($table === 'tx_hireme_faq') {
                $faq = $faqRepository->findByUid($uid);
                if ($faq) {
                    $faqObjects[] = $faq;
                }
            } elseif ($table === 'tx_hireme_faqgroup') {
                $faqGroup = $faqGroupRepository->findByUid($uid);
                if ($faqGroup) {
                    $faqObjects[] = $faqGroup;
                }
            }
        }

        return $faqObjects;
    }

    /**
     * Apply sorting to resolved FAQ objects
     *
     * @param array<FaqItemInterface> $faqObjects
     * @return array<FaqItemInterface>
     */
    private function applySorting(array $faqObjects): array
    {
        usort($faqObjects, function ($a, $b) {
            $sortingA = method_exists($a, 'getSorting') ? $a->getSorting() : 0;
            $sortingB = method_exists($b, 'getSorting') ? $b->getSorting() : 0;

            return $sortingA <=> $sortingB;
        });

        return $faqObjects;
    }
}
