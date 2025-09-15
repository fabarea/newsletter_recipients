<?php

use Fab\NewsletterRecipients\Controller\NewsletterRecipientController;

defined('TYPO3') || die('Access denied.');

call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'newsletter_recipients',
            'Pi1',
            [
                NewsletterRecipientController::class => 'editMany, updateMany',
            ],
            // non-cacheable actions
            [
                NewsletterRecipientController::class => 'editMany, updateMany',
            ]
        );

    }
);
