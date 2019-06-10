<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Newsletter recipients',
    'description' => 'Very simplistic database structure to cope with newsletter recipients to be connected with EXT:messenger to send newsletters.',
    'author' => 'Fabien Udriot',
    'author_email' => 'fabien@ecodev.ch',
    'author_company' => 'Ecodev',
    'state' => 'stable',
    'version' => '1.1.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-9.5.99',
            'vidi' => '3.2.0-0.0.0',
            'messenger' => '2.1.0-0.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'suggests' => [
    ],
];
