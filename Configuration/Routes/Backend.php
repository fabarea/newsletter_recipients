<?php

return [
    'newsletter_recipients_edit_many' => [
        'path' => '/newsletter-recipients/edit-many',
        'target' => \Fab\NewsletterRecipients\Controller\NewsletterRecipientController::class . '::editManyAction',
    ],
    'newsletter_recipients_update_many' => [
        'path' => '/newsletter-recipients/update-many',
        'target' => \Fab\NewsletterRecipients\Controller\NewsletterRecipientsController::class . '::updateManyAction',
    ],
];
