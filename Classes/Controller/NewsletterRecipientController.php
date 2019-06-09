<?php

namespace Fab\NewsletterRecipients\Controller;

/*
 * This file is part of the Fab/NewsletterRecipients project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use Fab\NewsletterRecipients\Domain\Repository\NewsletterRecipientRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Class NewsletterRecipientController
 */
class NewsletterRecipientController extends ActionController
{

    /**
     * @return void
     */
    public function editManyAction(): void
    {

    }

    /**
     * @param string $recipientCsvList
     * @param bool $deleteExistingRecipients
     * @return string
     */
    public function updateManyAction(string $recipientCsvList = '', $deleteExistingRecipients = true): string
    {
        if ($deleteExistingRecipients) {
            $this->getNewsletterRecipientRepository()->deleteAllAction();
        }
        $recipients = GeneralUtility::trimExplode("\n", trim($recipientCsvList));
        $numberOfRecipients = count($recipients);
        $counter = 0;
        foreach ($recipients as $recipientCsv) {
            $recipient = GeneralUtility::trimExplode(';', $recipientCsv);
            if (count($recipient) >= 3) {
                [$email, $firstName, $lastName] = $recipient;
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // We should check if the email exists
                    // If no, it is fine... we can further proceed.
                    // $deleteExistingRecipients == true means all emails were deleted beforehand
                    if ($deleteExistingRecipients || !$this->getNewsletterRecipientRepository()->exists($email)) {
                        $values = [
                            'email' => $email,
                            'first_name' => $firstName,
                            'last_name' => $lastName,
                        ];
                        $result = $this->getNewsletterRecipientRepository()->insert($values);
                        if ($result) {
                            $counter++;
                        }
                    }
                }
            }

        }
        return sprintf('Created %s/%s', $counter, $numberOfRecipients);
    }

    /**
     * @return object|NewsletterRecipientRepository
     */
    public function getNewsletterRecipientRepository(): NewsletterRecipientRepository
    {
        return GeneralUtility::makeInstance(NewsletterRecipientRepository::class);

    }

}
