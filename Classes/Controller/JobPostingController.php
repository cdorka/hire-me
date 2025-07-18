<?php

namespace ChristianDorka\HireMe\Controller;

use ChristianDorka\HireMe\DataProcessing\FaqDataProcessor;
use ChristianDorka\HireMe\Domain\DTO\FilterSelection;
use ChristianDorka\HireMe\Domain\DTO\SearchSelection;
use ChristianDorka\HireMe\Domain\DTO\TtContentFilter;
use ChristianDorka\HireMe\Domain\DTO\TtContentPagination;
use ChristianDorka\HireMe\Domain\DTO\TtContentSource;
use ChristianDorka\HireMe\Domain\Model\JobPosting;
use ChristianDorka\HireMe\Domain\Repository\CategoryRepository;
use ChristianDorka\HireMe\Domain\Repository\CountryRepository;
use ChristianDorka\HireMe\Domain\Repository\DepartmentRepository;
use ChristianDorka\HireMe\Domain\Repository\JobPostingRepository;
use ChristianDorka\HireMe\Domain\Repository\LocationRepository;
use ChristianDorka\HireMe\Domain\Repository\OrganizationRepository;
use ChristianDorka\HireMe\Domain\Repository\ScopeRepository;
use ChristianDorka\HireMe\Domain\Repository\SysCategoryRepository;
use ChristianDorka\HireMe\Domain\Repository\TypeRepository;
use ChristianDorka\HireMe\Enum\Generation;
use ChristianDorka\HireMe\Service\PaginationService;
use ChristianDorka\HireMe\Utility\DataMapperUtility;
use ChristianDorka\HireMe\Utility\ResponseUtility;
use CpCompartner\Base\Core\Pattern\Result;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Yaml\Yaml;
use TYPO3\CMS\Core\Error\Http\PageNotFoundException;
use TYPO3\CMS\Core\Http\ImmediateResponseException;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Form\Domain\Configuration\ConfigurationService as FormConfigurationService;
use TYPO3\CMS\Form\Domain\Factory\ArrayFormFactory;

class JobPostingController extends ActionController
{
    protected ?TtContentSource $sourceConfig = null;
    protected ?TtContentPagination $paginationConfig = null;
    protected ?TtContentFilter $filterConfig = null;
    protected ?array $data = null;
    protected ?SiteLanguage $language = null;

    public function __construct(

        protected FormConfigurationService $formConfigurationService,
        protected PaginationService $paginationService,

        protected readonly DataMapperUtility $dataMapperUtility,

        protected readonly JobPostingRepository $jobPostingRepository,
        protected readonly CategoryRepository $categoryRepository,
        protected readonly CountryRepository $countryRepository,
        protected readonly DepartmentRepository $departmentRepository,
        protected readonly LocationRepository $locationRepository,
        protected readonly OrganizationRepository $organizationRepository,
        protected readonly ScopeRepository $scopeRepository,
        protected readonly SysCategoryRepository $sysCategoryRepository,
        protected readonly TypeRepository $typeRepository,
    ) {
    }

    /**
     * TODO
     *
     * @param JobPosting|null $jobPosting Optional jobposting to allow custom redirect if page is called without a job
     *                                    posting provided, instead of typo3 exception
     * @param bool            $applicationSend
     *
     * @return ResponseInterface
     * @throws ImmediateResponseException
     * @throws PageNotFoundException
     */
    public function detailAction(?JobPosting $jobPosting = null, bool $applicationSend = false): ResponseInterface
    {
        if ($jobPosting === null) {
            return ResponseUtility::handleFallbackOrErrorResponse(
                pid: $this->data['tx_hireme_fallback_page'] ?? null,
                uriBuilder: $this->uriBuilder,
                errorMessage: 'Job Posting not found'
            );
        }

        $jobPosting = $this->jobPostingRepository->findByUidWithResult($jobPosting->getUid());

        if ($jobPosting->isError()) {
            return ResponseUtility::handleFallbackOrErrorResponse(
                pid: $this->data['tx_hireme_fallback_page'] ?? null,
                uriBuilder: $this->uriBuilder,
                errorMessage: 'Job Posting not found'
            );
        }

        $viewData = [
            'applicationSend' => $applicationSend
        ];

        if (is_countable($jobPosting->getData()) && count($jobPosting->getData()) > 0) {
            /** @var JobPosting $jobPostingData */
            $jobPostingData = $jobPosting->getData()[0];
            $viewData['jobPosting'] = $jobPostingData;

            // Render the form if configured
            if ($jobPostingData->getRenderApplication()) {
                $this->assignApplicationForm(jobPosting: $jobPostingData);
            }
        }


        if ($jobPostingData) {
            // Manually resolve FAQs using the same logic as DataProcessor
            $dataProcessor = GeneralUtility::makeInstance(FaqDataProcessor::class);
            $resolvedFaqs = $dataProcessor->resolveFaqReferences($jobPostingData->getFaqs());
            $this->view->assign('faqs', $resolvedFaqs);
        }


        $this->view->assignMultiple($viewData);
        return $this->htmlResponse();
    }

    /**
     * Render the configured TYPO3 form from the JobPosting object and assign it as variable to the action view
     *
     * @param JobPosting $jobPosting
     * @param string     $renderedFormVariableName
     * @param string     $formErrorVariableName
     *
     * @return void
     */
    protected function assignApplicationForm(
        JobPosting $jobPosting,
        string $renderedFormVariableName = "applicationForm",
        string $formErrorVariableName = "applicationFormError",
    ): void {
        $yamlPath = 'EXT:hire_me/Resources/Private/Forms/BasicApplicationForm.form.yaml';

        try {
            $formFactory = GeneralUtility::makeInstance(ArrayFormFactory::class);
            $yamlContent = GeneralUtility::getUrl(GeneralUtility::getFileAbsFileName($yamlPath));
            $formConfiguration = Yaml::parse($yamlContent);

            // Custom Finisher hinzufügen
            $this->addCustomFinishers($formConfiguration, $jobPosting);

            // Form-Action explizit setzen (falls gewünscht)
            $formConfiguration['renderingOptions']['submitButtonLabel'] = 'Bewerbung absenden';
            $formConfiguration['renderingOptions']['controllerAction'] = 'detail';
            $formConfiguration['renderingOptions']['additionalParams'] = [
                'tx_hireme_jobpostingdetails[applicationSend]' => true,
                'tx_hireme_jobpostingdetails[jobPosting]' => $jobPosting->getUid()
            ];


            // https://www.bahnen.nrw.dev.arpa/detail-jobs.html?tx_hireme_jobpostingdetails[action]=detail&tx_hireme_jobpostingdetails[controller]=JobPosting&tx_hireme_jobpostingdetails[jobPosting]=987346123&cHash=89d279897706829d73e23e533a5aab77

            // https://www.bahnen.nrw.dev.arpa/detail-jobs.html?tx_hireme_jobpostingdetails[action]=detail&tx_hireme_jobpostingdetails[controller]=JobPosting&cHash=67296f57ee3e785409753c5f3c82f279#basicApplicationForm

            // /detail-jobs.html?jobPosting=987346123&tx_hireme_jobpostingdetails[action]=detail&tx_hireme_jobpostingdetails[controller]=JobPosting&cHash=45b968b0c85b11d6cecdbd2a86c1e92b#basicApplicationForm
            // /detail-jobs.html?tx_hireme_jobpostingdetails[action]=detail&tx_hireme_jobpostingdetails[controller]=JobPosting&cHash=67296f57ee3e785409753c5f3c82f279#basicApplicationForm
            // /detail-jobs.html?tx_hireme_jobpostingdetails[action]=detail&tx_hireme_jobpostingdetails[controller]=JobPosting&cHash=67296f57ee3e785409753c5f3c82f279#basicApplicationForm
            // /detail-jobs.html?test=test&tx_hireme_jobpostingdetails[action]=detail&tx_hireme_jobpostingdetails[controller]=JobPosting&cHash=6db2366b6b7c219f256b75440e7555cd#basicApplicationForm
            // /detail-jobs.html?tx_hireme_jobpostingdetails[action]=detail&tx_hireme_jobpostingdetails[controller]=JobPosting&tx_hireme_jobpostingdetails[jobPosting]=987346123&cHash=89d279897706829d73e23e533a5aab77#basicApplicationForm

            // https://www.bahnen.nrw.dev.arpa/detail-jobs.html?tx_hireme_jobpostingdetails%5Baction%5D=detail&tx_hireme_jobpostingdetails%5Bcontroller%5D=JobPosting&tx_hireme_jobpostingdetails%5BjobPosting%5D=987346123&cHash=89d279897706829d73e23e533a5aab77#basicApplicationForm
            // https://www.bahnen.nrw.dev.arpa/detail-jobs.html?tx_hireme_jobpostingdetails%5Baction%5D=detail&tx_hireme_jobpostingdetails%5Bcontroller%5D=JobPosting&tx_hireme_jobpostingdetails%5BjobPosting%5D=987346123&cHash=89d279897706829d73e23e533a5aab77#basicApplicationForm


            // Form erstellen
            $formDefinition = $formFactory->build($formConfiguration);
            $formRuntime = $formDefinition->bind($this->request);

            // Rendern
            $formHtml = $formRuntime->render();
            $this->view->assign($renderedFormVariableName, $formHtml);
        } catch (\Exception $e) {
            $this->view->assign($formErrorVariableName, 'Formular konnte nicht geladen werden: ' . $e->getMessage());
        }
    }

    /**
     * Add custom finishers to the form configuration
     */
    protected function addCustomFinishers(array &$formConfiguration, JobPosting $jobPosting): void
    {
        // Ensure finishers array exists
        if (!isset($formConfiguration['finishers'])) {
            $formConfiguration['finishers'] = [];
        }

        /*
                // Add SaveApplication finisher at the beginning
                array_unshift($formConfiguration['finishers'], [
                    'identifier' => 'SaveApplicationFinisher',
                    'options' => [
                        'jobPostingUid' => $jobPosting->getUid(),
                    ],
                ]);
        */

        $formConfiguration['finishers'][] = [
            'identifier' => 'SaveApplication',
            'options' => [
                'jobPostingUid' => $jobPosting->getUid(),
            ],
        ];

        // Redirect finisher - redirect zu einer statischen Success-Seite
        $formConfiguration['finishers'][] = [
            'identifier' => 'Redirect',
            'options' => [
                'pageUid' => $this->settings['applicationSuccessPage'] ?? $GLOBALS['TSFE']->id,
                'additionalParameters' => [
                    'submitted' => '1',
                    'job' => $jobPosting->getUid()
                ],
            ],
        ];
    }

    /**
     * Handle form submissions from TYPO3 Forms
     * das TYPO3 Form Framework standardmäßig versucht, Form-Submissions an eine performAction zu senden
     */
    public function performAction(): ResponseInterface
    {
        // Form-Verarbeitung läuft über Finisher
        // Hier nur Redirect oder Response handling

        //  $arguments = $this->request->getArguments();

        //  // Falls ein JobPosting-Parameter vorhanden ist, zurück zur Detail-Seite
        //  if (isset($arguments['jobPosting'])) {
        //      return $this->redirect('detail', null, null, ['jobPosting' => $arguments['jobPosting']]);
        //  }


        //  // Andernfalls zur Liste
        //  return $this->redirect('list');
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
     * TODO
     *
     * @param FilterSelection|null $filterSelection
     *
     * @return ResponseInterface
     * @noinspection PhpUnused
     */
    public function latestAction(?FilterSelection $filterSelection = null): ResponseInterface
    {
        // Step 1: Initialize values
        $filterSelection ??= new FilterSelection();
        $this->generateCObjData();
        $this->generateCurrentRequestLanguage();
        $this->generateConfigDTOs();


        // Step 2: Get results to display based on the sourceConfig and the filterSelection of the user
        $jobPostings = $this->jobPostingRepository->findBySourceConfigAndFilterSelectionWithResult(
            $this->sourceConfig,
            $filterSelection,
        );

        $typeRepository = GeneralUtility::makeInstance(TypeRepository::class);


        $pagination = $this->generatePagination(
            $this->paginationConfig,
            $jobPostings,
            $filterSelection->getPageNumber()
        );

        $filter = $this->processFilter();

        // Assign to view
        $this->view->assignMultiple([
            "data" => $this->data,
            "language" => $this->language,

            'filter' => $filter,
            'pagination' => $pagination,

            'jobPostings' => $jobPostings,
            'filterSelection' => $filterSelection,
            'typeFilters' => $typeRepository->findByConfigWithResult(),
        ]);

        return $this->htmlResponse();
    }

    private function generateConfigDTOs(): void
    {
        $this->generateSourceConfigDTO();
        $this->generatePaginationConfigDTO();
        $this->generateFilterConfigDTO();
    }

    private function generateSourceConfigDTO(): void
    {
        $this->sourceConfig = $this->dataMapperUtility->mapFirstItem(TtContentSource::class, $this->data);
    }

    private function generatePaginationConfigDTO(): void
    {
        $this->paginationConfig = $this->dataMapperUtility->mapFirstItem(TtContentPagination::class, $this->data);
    }

    private function generateFilterConfigDTO(): void
    {
        $this->filterConfig = $this->dataMapperUtility->mapFirstItem(TtContentFilter::class, $this->data);
    }

    protected function generateCObjData(): void
    {
        $this->data = $this->request->getAttribute("currentContentObject")?->data ?? [];
    }

    protected function generateCurrentRequestLanguage(): void
    {
        $this->language = $this->request->getAttribute("language") ?? null;
    }



    /**
     * @param TtContentPagination $paginationConfig
     * @param Result              $items
     * @param int                 $currentPage
     *
     * @return ?array{
     *      config: TtContentPagination,
     *      items: array,
     *      currentPage: int,
     *      totalPages: int,
     *      totalItems: int,
     *      itemsPerPage: int|null,
     *      hasPages: bool,
     *      hasPreviousPage: bool,
     *      hasNextPage: bool,
     *      isFirstPage: bool,
     *      isLastPage: bool,
     *      startItem: int,
     *      endItem: int,
     *      paginationEnabled: bool
     *  }
     */
    private function generatePagination(
        TtContentPagination $paginationConfig,
        Result $items,
        int $currentPage = 1
    ): ?array {
        if ($items->isSuccess()) {
            return $this->paginationService->generateFromConfig(
                items: $items->getData(),
                currentPage: $currentPage,
                config: $paginationConfig
            );
        }
        return null;
    }

    /**
     * @return TtContentFilter|null
     */
    private function processFilter(): ?TtContentFilter
    {
        /** @var TtContentFilter|null $mapped */
        $mapped = $this->dataMapperUtility->mapFirstItem(
            className: TtContentFilter::class,
            data: $this->data
        );


        /** @var CategoryRepository $categoryRepository */
        $categoryRepository = GeneralUtility::makeInstance(CategoryRepository::class);
        $categoryResult = $categoryRepository->findByConfig($mapped);


        return $mapped;
    }

    /**
     * TODO
     *
     * @param SearchSelection|null $searchSelection
     *
     * @return ResponseInterface
     *
     * @noinspection PhpUnused
     */
    public function searchAction(SearchSelection $searchSelection = null): ResponseInterface
    {
        // Step 1: Initialize values
        $searchSelection ??= new SearchSelection();
        $this->generateCObjData();
        $this->generateCurrentRequestLanguage();
        $this->generateConfigDTOs();

        // Step 2: Generate filter select contents
        $filterCategories = match ($this->filterConfig->getCategoryType()) {
            Generation::MANUALLY->value => $this->filterConfig->getCategoryItems(),
            Generation::GENERATED->value => $this->categoryRepository->findByConfig($this->filterConfig)->getData(),
            default => null,
        };
        $filterCountries = match ($this->filterConfig->getCountryType()) {
            Generation::MANUALLY->value => $this->filterConfig->getCountryItems(),
            Generation::GENERATED->value => $this->countryRepository->findByConfig($this->filterConfig)->getData(),
            default => null,
        };
        $filterDepartments = match ($this->filterConfig->getDepartmentType()) {
            Generation::MANUALLY->value => $this->filterConfig->getDepartmentItems(),
            Generation::GENERATED->value => $this->departmentRepository->findByConfig($this->filterConfig)->getData(),
            default => null,
        };
        $filterLocations = match ($this->filterConfig->getLocationType()) {
            Generation::MANUALLY->value => $this->filterConfig->getLocationItems(),
            Generation::GENERATED->value => $this->locationRepository->findByConfig($this->filterConfig)->getData(),
            default => null,
        };
        $filterOrganizations = match ($this->filterConfig->getOrganizationType()) {
            Generation::MANUALLY->value => $this->filterConfig->getOrganizationItems(),
            Generation::GENERATED->value => $this->organizationRepository->findByConfig($this->filterConfig)->getData(),
            default => null,
        };
        $filterScopes = match ($this->filterConfig->getScopeType()) {
            Generation::MANUALLY->value => $this->filterConfig->getScopeItems(),
            Generation::GENERATED->value => $this->scopeRepository->findByConfig($this->filterConfig)->getData(),
            default => null,
        };
        $filterSysCategories = match ($this->filterConfig->getSysCategoryType()) {
            Generation::MANUALLY->value => $this->filterConfig->getSysCategoryItems(),
            Generation::GENERATED->value => $this->sysCategoryRepository->findByConfig($this->filterConfig)->getData(),
            default => null,
        };
        $filterTypes = match ($this->filterConfig->getTypeType()) {
            Generation::MANUALLY->value => $this->filterConfig->getTypeItems(),
            Generation::GENERATED->value => $this->typeRepository->findByConfig($this->filterConfig)->getData(),
            default => null,
        };




        // Step TODO: Assign variables
        $this->view->assignMultiple([
            'data' => $this->data,
            'language' => $this->language,

            'filterCategories' => $filterCategories,
            'filterCountries' => $filterCountries,
            'filterDepartments' => $filterDepartments,
            'filterLocations' => $filterLocations,
            'filterOrganizations' => $filterOrganizations,
            'filterScopes' => $filterScopes,
            'filterSysCategories' => $filterSysCategories,
            'filterTypes' => $filterTypes,

            'searchSelection' => $searchSelection,
            'employmentTypesUids' => $this->filterConfig->getEmploymentTypesArray()  ?? null,
            'scopes' => $scopes ?? null,
            '$hiringCompanies' => $hiringCompanies ?? null,
            'careerLevelsUids' => $careerLevelsUids ?? null,
        ]);

        return $this->htmlResponse();
    }

    /**
     * @return mixed[]|null
     */
    private function getGeneratedCategories(): ?array
    {
        $result = $this->categoryRepository->findByConfig($this->filterConfig);

        return $result->isSuccess() ? $result->getData() : null;
    }

    /**
     * @return mixed[]|null
     */
    private function getGeneratedSysCategories(): ?array
    {
        $result = $this->sysCategoryRepository->findByConfig($this->filterConfig);

        return $result->isSuccess() ? $result->getData() : null;
    }

    /**
     * Get job postings based on filter selection
     */
    protected function getFilteredJobPostings(FilterSelection $filterSelection): QueryResultInterface
    {
        $activeFilters = $filterSelection->getFilter();

        // If "alle" is selected or no specific filters, return all
        if (empty($activeFilters) || in_array('alle', $activeFilters, true)) {
            return $this->jobPostingRepository->findAll();
        }

        // Apply specific filters
        return $this->jobPostingRepository->findByFilters($activeFilters);
    }
}
