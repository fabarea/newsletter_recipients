<?php

use Fab\NewsletterRecipients\Controller\NewsletterRecipientController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die('Access denied.');

call_user_func(
    function () {

        // Icons are now registered via Configuration/Icons.php
        

        // Add new sprite icon.
        $icons = [
            'recipients' => 'EXT:newsletter_recipients/Resources/Public/Images/newsletter_recipients.png',
        ];

        /** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($icons as $key => $icon) {
            $iconRegistry->registerIcon('extensions-newsletter-recipients-' . $key,
                \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
                [
                    'source' => $icon
                ]
            );
        }
        unset($iconRegistry);


        // Default User TSConfig to be added in any case.
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('

            # Hide the module in the BE.
            options.hideModules.user := addToList(NewsletterRecipientsM1)

        ');

        $configuration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
        )->get('newsletter_recipients');


    }
);
