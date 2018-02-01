<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipeingredient',
        'label' => 'qty',
        'label_alt' => 'ingredient',
        'label_alt_force' => TRUE,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => FALSE,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
		'searchFields' => 'qty,recipe,ingredient',
        'iconfile' => 'EXT:recipeblog/Resources/Public/Icons/tx_recipeblog_domain_model_recipeingredient.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, qty, recipe, ingredient',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, qty, recipe, ingredient, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					]
				],
				'default' => 0,
			],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_recipeblog_domain_model_recipeingredient',
                'foreign_table_where' => 'AND tx_recipeblog_domain_model_recipeingredient.pid=###CURRENT_PID### AND tx_recipeblog_domain_model_recipeingredient.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
		't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
		'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
		'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ]
            ],
        ],
        'qty' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipeingredient.qty',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'recipe' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipeingredient.recipe',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectSingle',
			    'foreign_table' => 'tx_recipeblog_domain_model_recipe',
			    'minitems' => 0,
			    'maxitems' => 1,
			],
	    ],
	    'ingredient' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipeingredient.ingredient',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectSingle',
			    'foreign_table' => 'tx_recipeblog_domain_model_ingredient',
			    'minitems' => 0,
			    'maxitems' => 1,
			],
	    ],
    ],
];
