<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Newsletter recipients',
    'description' => 'Very simplistic database structure to cope with newsletter recipients to be connected with EXT:messenger to send newsletters.',
    'author' => 'Fabien Udriot',
    'author_email' => 'fabien@ecodev.ch',
    'author_company' => 'Ecodev',
    'state' => 'stable',
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
