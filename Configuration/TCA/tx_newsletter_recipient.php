<?php
if (!defined('TYPO3')) die ('Access denied.');

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
				'type' => 'check',
				'default' => 0,
			],
		],
		'first_name' => [
			'label' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf:first_name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'max' => 255,
			],
		],
		'last_name' => [
			'label' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf:last_name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim',
				'max' => 255,
			],
		],
		'email' => [
			'label' => 'LLL:EXT:newsletter_recipients/Resources/Private/Language/tx_newsletter_recipient.xlf:email',
			'config' => [
				'type' => 'email',
				'size' => 30,
			],
		],
    ],
];
