<?php


namespace ChristianDorka\HireMe\Controller;



use ChristianDorka\HireMe\Domain\Model\JobPosting;
use ChristianDorka\HireMe\Domain\Repository\JobPostingRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\Controller\ErrorController;

class JobPostingController extends ActionController
{

    public function __construct(
        protected readonly JobPostingRepository $jobPostingRepository
    ) {}

    public function detailAction(?JobPosting $jobPosting = null): ResponseInterface {
        if ($jobPosting === null) {
            // TODO error page content is called twice
            /** @var ErrorController $errorController */
            $errorController = GeneralUtility::makeInstance(ErrorController::class);
            return $errorController->pageNotFoundAction($this->request, 'Job Posting not ');
        }
        return $this->htmlResponse();
    }

    public function listAction(): ResponseInterface {
        return $this->htmlResponse();
    }

    public function latestAction(): ResponseInterface {
        return $this->htmlResponse();
    }

    public function filterAction(): ResponseInterface {
        return $this->htmlResponse();
    }
}
