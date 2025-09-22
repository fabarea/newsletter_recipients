<?php

use Fab\NewsletterRecipients\Controller\NewsletterRecipientController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die('Access denied.');

call_user_func(
    function () {

        // Icons are now registered via Configuration/Icons.php


        // Module registration is now handled via Configuration/Backend/Modules.php

        // Default User TSConfig to be added in any case.
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('

            # Hide the module in the BE.
            options.hideModules.user := addToList(NewsletterRecipientsM1)

        ');
    }
);


