<?php
declare(strict_types=1);

namespace ChristianDorka\HireMe\Form\Finisher;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Form\Domain\Finishers\AbstractFinisher;
use Symfony\Component\Messenger\MessageBusInterface;

class SaveApplicationFinisher extends AbstractFinisher
{
    protected MessageBusInterface $messageBus;

    public function injectMessageBus(MessageBusInterface $messageBus): void
    {
        $this->messageBus = $messageBus;
    }

    protected function executeInternal(): void
    {
        $jobPostingUid = (int)$this->parseOption('jobPostingUid');

        if ($jobPostingUid <= 0) {
            $this->addFlashMessage('Invalid job posting', ContextualFeedbackSeverity::ERROR);
            return;
        }

        // Get all form values
        $formValues = $this->finisherContext->getFormValues();

        // Prepare data for database
        $applicationData = [
            'pid' => $this->getTypoScriptFrontendController()->id,
            'job_posting' => $jobPostingUid,
            'form_data' => json_encode($formValues),
            'status' => 'pending',
            'submission_date' => time(),
            'tstamp' => time(),
            'crdate' => time(),
        ];

        // Save to database
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $connection = $connectionPool->getConnectionForTable('tx_hireme_application');

        try {
            $connection->insert('tx_hireme_application', $applicationData);
            $applicationUid = (int)$connection->lastInsertId();

            // Queue email notification
            $this->queueEmailNotification($applicationUid, $jobPostingUid, $formValues);

            $this->addFlashMessage(
                'Ihre Bewerbung wurde erfolgreich eingereicht.',
                ContextualFeedbackSeverity::OK
            );

        } catch (\Exception $e) {
            $this->addFlashMessage(
                'Ein Fehler ist aufgetreten. Bitte versuchen Sie es später erneut.',
                ContextualFeedbackSeverity::ERROR
            );
        }
    }

    protected function queueEmailNotification(int $applicationUid, int $jobPostingUid, array $formValues): void
    {
    //   // Create message for async processing
    //   $message = new SendApplicationEmailMessage(
    //       $applicationUid,
    //       $jobPostingUid,
    //       $formValues
    //   );

    //   // Dispatch to message bus
    //   $this->messageBus->dispatch($message);
    }

    protected function addFlashMessage(string $message, ContextualFeedbackSeverity $severity): void
    {
        $flashMessageService = GeneralUtility::makeInstance(FlashMessageService::class);
        $messageQueue = $flashMessageService->getMessageQueueByIdentifier();

        $flashMessage = GeneralUtility::makeInstance(
            FlashMessage::class,
            $message,
            '',
            $severity,
            true
        );

        $messageQueue->addMessage($flashMessage);
    }

    protected function getTypoScriptFrontendController(): \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
    {
        return $GLOBALS['TSFE'];
    }
}
