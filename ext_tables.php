<?php

use Fab\NewsletterRecipients\Controller\NewsletterRecipientController;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        // Allow domain model to be on standard pages.
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_newsletter_recipient');

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


        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
            'Fab.NewsletterRecipients',
            'user', // Make media module a submodule of 'user'
            'm1',
            'bottom', // Position
            [
                NewsletterRecipientController::class => 'editMany, updateMany',
            ],
            [
                'access' => 'user,group',
                'icon' => 'EXT:newsletter_recipients/ext_icon.svg',
                #'labels' => 'LLL:EXT:messenger/Resources/Private/Language/module_messenger.xlf',
            ]
        );

        // Default User TSConfig to be added in any case.
        TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('

            # Hide the module in the BE.
            options.hideModules.user := addToList(NewsletterRecipientsM1)

        ');

        $configuration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
        )->get('newsletter_recipients');

        /** @var \Fab\Vidi\Module\ModuleLoader $moduleLoader */
        $moduleLoader = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Fab\Vidi\Module\ModuleLoader::class);

        // Register a new module
        $moduleLoader
            ->setMainModule('web')
            ->ignorePid(true)
            ->isShown((bool)$configuration['load_be_module'])
            ->setDataType('tx_newsletter_recipient')
            ->setModuleLanguageFile('LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf')
            ->setIcon('EXT:vidi/Resources/Public/Images/fe_users.svg')
            #->addMenuMassActionComponents(
            #    [
            #        \Fab\Messenger\View\MenuItem\SendMenuItem::class,
            #        \Fab\NewsletterRecipients\View\MenuItem\UpdateRecipientsMenuItem::class,
            #        \Fab\Vidi\View\MenuItem\DividerMenuItem::class,
            #    ]
            #)
            ->register();
    }
);


