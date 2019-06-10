<?php
if (!defined('TYPO3_MODE')) die ('Access denied.');

return [
	'ctrl' => [
		'title' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf:table.label',
        'label' => 'first_name',
        'label_alt' => 'last_name',
        'label_alt_force' => true,
        'default_sortby' => 'ORDER BY first_name ASC',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'searchFields' => 'last_name,first_name,',
		'typeicon_classes' => [
			'default' => 'extensions-newsletter-recipients-recipients',
		],
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
	],
	'types' => [
		'1' => ['showitem' => 'hidden, last_name, first_name, email'],
	],
	'palettes' => [
		'1' => ['showitem' => ''],
	],
	'columns' => [
		'uid' => [
			'label' => 'UID',
			'config' => [
				'type' => 'input',
			],
		],
		'hidden' => [
			'label' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf:hidden',
			'config' => [
				'type' => 'input',
			],
		],
		'first_name' => [
			'label' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf:first_name',
			'config' => [
				'type' => 'input',
			],
		],
		'last_name' => [
			'label' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf:last_name',
			'config' => [
				'type' => 'input',
			],
		],
		'email' => [
			'label' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf:email',
			'config' => [
				'type' => 'input',
			],
		],
	],
    'grid' => [
        'facets' => [
            'uid',
            'first_name',
            'last_name',
            'email',
            \Fab\Vidi\Facet\StandardFacet::class => [
                'name' => 'hidden',
                'label' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/locallang.xlf:active',
                'suggestions' => [
                    '0' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/locallang.xlf:active.0',
                    '1' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/locallang.xlf:active.1'
                ]
            ],
        ],
        'columns' => [
            '__checkbox' => [
                'renderer' => \Fab\Vidi\Grid\CheckBoxRenderer::class,
            ],
            'uid' => [
                'visible' => false,
                'label' => 'Id',
                'width' => '5px',
            ],
            'first_name' => [
                'visible' => true,
                'editable' => true,
            ],
            'last_name' => [
                'visible' => true,
                'editable' => true,
            ],
            'email' => [
                'visible' => true,
                'editable' => true,
            ],
            'hidden' => [
                'renderer' => \Fab\Vidi\Grid\VisibilityRenderer::class,
                'width' => '3%',
            ],
            '__buttons' => [
                'renderer' => \Fab\Vidi\Grid\ButtonGroupRenderer::class,
            ],
        ],
    ],
];
