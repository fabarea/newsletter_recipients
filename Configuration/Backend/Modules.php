<?php

return [
    'user' => [
        'NewsletterRecipients' => [
            'parent' => 'user',
            'position' => ['after' => 'user_setup'],
            'access' => 'user,group',
            'iconIdentifier' => 'extensions-newsletter-recipients-recipients',
            'labels' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf',
            'extensionName' => 'NewsletterRecipients',
            'controllerActions' => [
                \Fab\NewsletterRecipients\Controller\NewsletterRecipientController::class => [
                    'editMany',
                    'updateMany',
                ],
            ],
        ],
    ],
];
