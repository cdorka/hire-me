<?php

namespace ChristianDorka\HireMe\Controller;

use ChristianDorka\HireMe\DataProcessing\FaqDataProcessor;
use ChristianDorka\HireMe\Domain\DTO\FilterDto;
use ChristianDorka\HireMe\Domain\DTO\TtContentFilter;
use ChristianDorka\HireMe\Domain\Model\JobPosting;
use ChristianDorka\HireMe\Domain\Repository\JobPostingRepository;
use ChristianDorka\HireMe\Domain\Repository\TypeRepository;
use ChristianDorka\HireMe\Utility\ResponseUtility;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Yaml\Yaml;
use TYPO3\CMS\Core\Error\Http\PageNotFoundException;
use TYPO3\CMS\Core\Http\ImmediateResponseException;
use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Form\Domain\Factory\ArrayFormFactory;
use TYPO3\CMS\Form\Domain\Configuration\ConfigurationService as FormConfigurationService;

class JobPostingController extends ActionController
{
    private array $data = [];
    private SiteLanguage|null $language = null;


    public function __construct(
        protected readonly JobPostingRepository $jobPostingRepository,
        protected readonly DataMapper $dataMapper,
        protected FormConfigurationService $formConfigurationService,
    ) {}


    /**
     * Initialize view - called after view is created but before action
     */
    protected function initializeView(): void
    {
        $this->data = $this->request->getAttribute("currentContentObject")?->data ?? [];
        $this->language  = $this->request->getAttribute("language") ?? null;

        $this->view->assignMultiple([
            "data" => $this->data,
            "language" => $this->language,
        ]);
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
                'tx_hireme_jobpostingdetails[jobPosting]'=> $jobPosting->getUid()
            ];

            DebuggerUtility::var_dump('$formConfiguration');
            DebuggerUtility::var_dump($formConfiguration);

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
        /**
         * @var TtContentFilter|null $cObjFilter The mapped tt_content to a filter DTO, or null if mapping failed
         */
        $cObjFilter = $this->dataMapper->map(TtContentFilter::class, [$this->data])[0] ?? null;





        if ($cObjFilter !== null) {
            $employmentTypesUids = GeneralUtility::intExplode(',', $cObjFilter->getTxHiremeFilterEmploymentTypes(), true);

            // Now you have the content element with all relations loaded
            $scopes = $cObjFilter->getTxHiremeFilterScopesAsArray();

            $hiringCompanies = $cObjFilter->getTxHiremeFilterHiringOrganizations();

            $careerLevelsUids = GeneralUtility::intExplode(',',  $cObjFilter->getTxHiremeFilterCareerLevels(), true);
        }



        $this->view->assignMultiple([
            'employmentTypesUids' => $employmentTypesUids ?? null,
            'scopes' => $scopes ?? null,
            '$hiringCompanies' => $hiringCompanies ?? null,
            'careerLevelsUids' => $careerLevelsUids ?? null,
        ]);

        return $this->htmlResponse();
    }
}
