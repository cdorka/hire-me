<?php

namespace ChristianDorka\HireMe\Controller;

use ChristianDorka\HireMe\Domain\DTO\FilterDto;
use ChristianDorka\HireMe\Domain\Model\JobPosting;
use ChristianDorka\HireMe\Domain\Repository\JobPostingRepository;
use ChristianDorka\HireMe\Domain\Repository\TypeRepository;
use ChristianDorka\HireMe\Enum\Job\EmploymentType;
use ChristianDorka\HireMe\Traits\Property\EmploymentTypesProperty;
use ChristianDorka\HireMe\Utility\ResponseUtility;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Error\Http\PageNotFoundException;
use TYPO3\CMS\Core\Error\PageErrorHandler\PageContentErrorHandler;
use TYPO3\CMS\Core\Http\ImmediateResponseException;
use TYPO3\CMS\Core\Http\NormalizedParams;
use TYPO3\CMS\Core\Http\ServerRequestFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MathUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Controller\MvcPropertyMappingConfiguration;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\ColumnMap;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration;
use TYPO3\CMS\Extbase\Property\TypeConverter\ObjectStorageConverter;
use TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\Controller\ErrorController;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

class JobPostingController extends ActionController
{
    private array $data = [];


    public function __construct(
        protected readonly JobPostingRepository $jobPostingRepository
    ) {}


    /**
     * Initialize view - called after view is created but before action
     * Use this for view-specific initialization
     */
    protected function initializeView(): void
    {
        $contentObject = $this->request->getAttribute('currentContentObject');
        $contentObjectData = $contentObject?->data ?? [];

        $currentLanguage = $this->request->getAttribute('language') ?? null;

        DebuggerUtility::var_dump($currentLanguage);

        $this->data = $contentObjectData;

        $this->view->assignMultiple([
            'data' => $contentObjectData,
            'language' => $currentLanguage,
        ]);
    }


    /**
     * TODO
     *
     * @param JobPosting|null $jobPosting Optional jobposting to allow custom redirect if page is called without a job
     *                                    posting provided, instead of typo3 exception
     *
     * @return ResponseInterface
     *
     * @throws PageNotFoundException|ImmediateResponseException
     *
     * @noinspection PhpUnused
     */
    public function detailAction(?JobPosting $jobPosting = null): ResponseInterface
    {
        // TODO
        if ($jobPosting === null) {
            // TODO
            return ResponseUtility::handleFallbackOrErrorResponse(
                pid: $this->data['tx_hireme_fallback_page'] ?? null,
                uriBuilder: $this->uriBuilder,
                errorMessage: 'Job Posting not found'
            );
        }

        // TODO
        $jobPosting = $this->jobPostingRepository->findByUidWithResult($jobPosting->getUid());

        // TODO
        if ($jobPosting->isError() ) {
            return ResponseUtility::handleFallbackOrErrorResponse(
                pid: $this->data['tx_hireme_fallback_page'] ?? null,
                uriBuilder: $this->uriBuilder,
                errorMessage: 'Job Posting not found'
            );
        }

        // TODO
        if (is_countable($jobPosting->getData()) && count($jobPosting->getData()) > 0) {



            $this->view->assignMultiple([
                "jobPosting" => $jobPosting->getData()[0],
            ]);
        }

        // TODO
        return $this->htmlResponse();
    }

    public function listAction(): ResponseInterface
    {
        // Common data is already available via initializeView()

        // Add list-specific data
        $this->view->assignMultiple([
            'jobPostings' => $this->jobPostingRepository->findAll(),
        ]);

        return $this->htmlResponse();
    }


    /**
     * Latest action - handles both GET and POST requests
     */
    public function latestAction(?FilterDto $filterDto = null): ResponseInterface
    {



        // Initialize empty filter selection if none provided
        if ($filterDto === null) {
            $filterDto = new FilterDto();
        }

        // Handle direct filter parameter from request (for backward compatibility)
      // if ($this->request->hasArgument('filter')) {
      //     $directFilter = $this->request->getArgument('filter');
      //     if (is_array($directFilter) && !empty($directFilter)) {
      //         $filterDto->setFilter($directFilter);
      //     }
      // }


        // Get filtered job postings
        // $jobPostings = $this->getFilteredJobPostings($filterDto);
        $limit = $this->request->getAttribute('currentContentObject')?->data['tx_hireme_results_limit'] ?? null;
        $jobPostings = $this->jobPostingRepository->findByConfigAndFilterDtoWithResult(
            limit: $limit,
            filterDto: $filterDto,
        );


        $typeRepository = GeneralUtility::makeInstance(TypeRepository::class);
        $typeFilters = $typeRepository->findByConfigWithResult();

        DebuggerUtility::var_dump($jobPostings);

        // Assign to view
        $this->view->assignMultiple([
            'jobPostings' => $jobPostings,
            'filterDto' => $filterDto,
            'typeFilters' => $typeRepository->findByConfigWithResult(),
        ]);

        return $this->htmlResponse();
    }

    /**
     * Get job postings based on filter selection
     */
    protected function getFilteredJobPostings(FilterDto $filterSelection): QueryResultInterface
    {
        $activeFilters = $filterSelection->getFilter();

        // If "alle" is selected or no specific filters, return all
        if (empty($activeFilters) || in_array('alle', $activeFilters, true)) {
            return $this->jobPostingRepository->findAll();
        }

        // Apply specific filters
        return $this->jobPostingRepository->findByFilters($activeFilters);
    }




    public function searchAction(): ResponseInterface
    {






        // Common data is already available via initializeView()

        // Handle search logic here
        // $searchTerm = $this->request->getArgument('search') ?? '';

        // TODO
        // TODO
        $employmentTypes = GeneralUtility::intExplode(',', $this->data['tx_hireme_filter_employment_types'] ?? '', true);

        $careerLevels = GeneralUtility::intExplode(',', $this->data['tx_hireme_filter_career_levels'] ?? '', true);

        DebuggerUtility::var_dump('test');


        /** @var DataMapper $dataMapper */
        $dataMapper = GeneralUtility::makeInstance(DataMapper::class);

        // Create a dummy content element object to fetch relations from
        $contentElement = $dataMapper->map(
            \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer::class, // Or your content model if you have one
            $this->data
        );

        DebuggerUtility::var_dump($contentElement);

        /** @var DataMapper $dataMapper */
        $dataMapper = GeneralUtility::makeInstance(DataMapper::class);

        // Create a column map manually for the MM relation
        $columnMap = ColumnMap::class
            GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\ColumnMap::class,
            'tx_hireme_filter_scopes',
            'tx_hireme_filter_scopes'
        );




        DebuggerUtility::var_dump($columnMap); // Now you have the actual scope objects




        $this->view->assignMultiple([
            // enum types
            "employmentTypes" => $employmentTypes,
            "careerLevels" => $careerLevels,

            // 'searchTerm' => $searchTerm,
            // 'searchResults' => $searchTerm ? $this->jobPostingRepository->findBySearchTerm($searchTerm) : [],
        ]);

        return $this->htmlResponse();
    }
}
