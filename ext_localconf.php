<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {


        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'newsletter_recipients',
            'Pi1',
            [
                'NewsletterRecipient' => 'editMany, updateMany',
            ],
            // non-cacheable actions
            [
                'NewsletterRecipient' => 'editMany, updateMany',
            ]
        );

    }
);
