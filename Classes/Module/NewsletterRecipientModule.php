<?php
namespace Fab\NewsletterRecipients\Module;

/*
 * This file is part of the Fab/NewsletterRecipients project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use TYPO3\CMS\Core\SingletonInterface;

/**
 * Class NewsletterRecipientModule
 */
class NewsletterRecipientModule implements SingletonInterface
{

    /**
     * @var string
     */
    const SIGNATURE = 'user_NewsletterRecipientsM1';

    /**
     * @var string
     */
    const PARAMETER_PREFIX = 'tx_newsletterrecipients_user_newsletterrecipientsm1';

    /**
     * @return string
     */
    static public function getSignature()
    {
        return self::SIGNATURE;
    }

    /**
     * @return string
     */
    static public function getParameterPrefix()
    {
        return self::PARAMETER_PREFIX;
    }

}
