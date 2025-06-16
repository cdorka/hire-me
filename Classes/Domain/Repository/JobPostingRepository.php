<?php
declare(strict_types=1);


namespace ChristianDorka\HireMe\Domain\Repository;

use ChristianDorka\HireMe\Domain\DTO\FilterDto;
use ChristianDorka\HireMe\Domain\Model\FaqItemInterface;
use CpCompartner\Base\Core\Pattern\Result;
use CpCompartner\Base\Core\Repository\Constraints\CollectionConstraintBuilder;
use CpCompartner\Base\Core\Repository\Constraints\IntegerConstraintBuilder;
use CpCompartner\Base\Core\Repository\Enums\CollectionConstraintOperator;
use CpCompartner\Base\Core\Repository\Enums\IntegerConstraintOperator;
use CpCompartner\Base\Core\Repository\ExtendedRepository;
use Doctrine\DBAL\Query\QueryException;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class JobPostingRepository extends ExtendedRepository
{
    public function __construct(
        private readonly FaqRepository $faqRepository,
        private readonly FaqGroupRepository $faqGroupRepository
    ) {
        parent::__construct();
    }

    /**
     */
    public function findByUidWithResult(
        int $uid
    ): Result {

        // TODO
        $query = $this->createQuery();
        $constraints = [];

        // TODO
        $integerConstraintBuilder = GeneralUtility::makeInstance(IntegerConstraintBuilder::class);

        // TODO
        $constraints[] = $integerConstraintBuilder->build(
            query: $query,
            property: 'uid',
            operator: IntegerConstraintOperator::EQUALS,
            value: $uid,
        );

        // TODO
        try {
            return $this->findWithResult(
                constraints: $constraints,
                limit: 1,
            );
        } catch (QueryException $e) {
            return Result::error(1, ['message' => $e->getMessage()]);
        } catch (InvalidQueryException $e) {
            return Result::error(2, ['message' => $e->getMessage()]);
        }
    }

    public function findByConfigAndFilterDtoWithResult(
        ?int $limit = null,
        ?FilterDto $filterDto = null,
    ): Result {

        $collectionConstraintBuilder = GeneralUtility::makeInstance(CollectionConstraintBuilder::class);

        $query = $this->createQuery();



        $constraints = [];

        if ($filterDto->getTypes()->toArray()) {
            $constraints[] = $collectionConstraintBuilder->build(
                $query,
                'types.uid',
                CollectionConstraintOperator::OR_IN,
                $filterDto->getTypes()->toArray()
            );
        }

        return $this->findWithResult(
            constraints: $constraints,
            limit: 1);

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

        $references = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $faqReferences, true);

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
                $faq = $this->faqRepository->findByUid($uid);
                if ($faq) {
                    $faqObjects[] = $faq;
                }
            } elseif ($table === 'tx_hireme_faqgroup') {
                $faqGroup = $this->faqGroupRepository->findByUid($uid);
                if ($faqGroup) {
                    $faqObjects[] = $faqGroup;
                }
            }
        }

        return $faqObjects;
    }

}
