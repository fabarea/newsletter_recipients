<?php

defined('TYPO3') || die('Access denied.');

// Add newsletter recipients plugin to content element wizard
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    [
        'LLL:EXT:newsletter_recipients/Resources/Private/Language/locallang.xlf:plugin.title',
        'newsletter_recipients_pi1',
        'extensions-newsletter-recipients-recipients'
    ],
    'CType',
    'newsletter_recipients'
);
