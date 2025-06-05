<?php

namespace ChristianDorka\HireMe\Controller;

use ChristianDorka\HireMe\Domain\DTO\FilterDto;
use ChristianDorka\HireMe\Domain\Model\JobPosting;
use ChristianDorka\HireMe\Domain\Repository\JobPostingRepository;
use ChristianDorka\HireMe\Domain\Repository\TypeRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\Controller\MvcPropertyMappingConfiguration;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration;
use TYPO3\CMS\Extbase\Property\TypeConverter\ObjectStorageConverter;
use TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\Controller\ErrorController;

class JobPostingController extends ActionController
{
    private array $commonData = [];


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

        $this->view->assignMultiple([
            'data' => $contentObjectData,
            'language' => $currentLanguage,
        ]);
    }


    public function detailAction(?JobPosting $jobPosting = null): ResponseInterface
    {
        // Option 1: Common data is already assigned via initializeView()

        // Option 2: If you need action-specific common setup, call:
        // $this->initializeCommonActionData();

      // if ($jobPosting === null) {
      //     // TODO error page content is called twice
      //     /** @var ErrorController $errorController */
      //     $errorController = GeneralUtility::makeInstance(ErrorController::class);
      //     return $errorController->pageNotFoundAction($this->request, 'Job Posting not found');
      // }


        $this->view->assignMultiple([
            "jobPosting" => $this->jobPostingRepository->findByConfigWithResult()
        ]);

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
        $searchTerm = $this->request->getArgument('search') ?? '';

        $this->view->assignMultiple([
            'searchTerm' => $searchTerm,
            'searchResults' => $searchTerm ? $this->jobPostingRepository->findBySearchTerm($searchTerm) : [],
        ]);

        return $this->htmlResponse();
    }
}
