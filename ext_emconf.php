<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Newsletter recipients',
    'description' => 'Very simplistic database structure to cope with newsletter recipients to be connected with EXT:messenger to send newsletters.',
    'author' => 'Fabien Udriot',
    'author_email' => 'fabien@ecodev.ch',
    'author_company' => 'Ecodev',
    'conflicts' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-9.5.99',
            'vidi' => '3.0.0-0.0.0',
        ],
        'conflicts' => [
        ],
        'suggests' => [
            'messenger' => '0.0.0-0.0.0',
        ],
    ],
    'suggests' => [
    ],
];
