<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
	'versioningWS' => FALSE,
        'default_sortby' => 'title',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
	'searchFields' => 'title,pageuid,brief,image,yturl,serves,uploadedon,views,likes,category,tags,amazonads',
        'iconfile' => 'EXT:recipeblog/Resources/Public/Icons/tx_recipeblog_domain_model_recipe.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, pageuid, title, brief, duration, image, yturl, serves, uploadedon, views, likes, category, tags,ingredients,steps,amazonads',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, pageuid, title, brief, duration, image, yturl, serves, uploadedon,--div--;Relations, category,tags, ingredients, steps,--div--;ADs & Activities,amazonads,views,likes, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_recipeblog_domain_model_recipe',
                'foreign_table_where' => 'AND tx_recipeblog_domain_model_recipe.pid=###CURRENT_PID### AND tx_recipeblog_domain_model_recipe.sys_language_uid IN (-1,0)',
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
        'pageuid'=> [
	       'exclude' => true,
	       'label' =>'Recipe Page',
	       'config' => [
			    'type' => 'input',
			    'size' => 10,
			    'eval' => 'int'
			],
	    ],
       'title' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.title',
	       'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	   'brief' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.brief',
	       'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 5,
			    'eval' => 'trim'
			]
	    ],
            'duration' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_cookingstep.duration',
	        'config' => [
			    'type' => 'input',
			    'size' => 10,
			    'eval' => 'trim'
			]
	    ],
	   'image' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.image',
	       'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'image',
			    [
			        'appearance' => [
			            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
			        ],
			        'foreign_types' => array(
						'0' => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						)
					),
			        'maxitems' => 1
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
	    ],
	   'yturl' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.yturl',
	       'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			]
	    ],
	   'serves' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.serves',
	       'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	    ],
	   'uploadedon' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.uploadedon',
	       'config' => [
			    'type' => 'input',
                            'renderType' => 'inputDateTime',
			    'size' => 7,
			    'eval' => 'date',
			    'default' => time()
			],
	    ],
	   'views' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.views',
	       'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	    ],
	   'likes' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.likes',
	       'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	    ],
	   'category' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.category',
	       'config' => [
			    'type' => 'select',
			    'renderType' => 'selectSingle',
			    'foreign_table' => 'tx_recipeblog_domain_model_category',
			    'minitems' => 0,
			    'maxitems' => 1,
			],
	    ],
	   'tags' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.tags',
	       'config' => [
			    'type' => 'select',
			    'renderType' => 'selectMultipleSideBySide',
			    'foreign_table' => 'tx_recipeblog_domain_model_tag',
			    'MM' => 'tx_recipeblog_recipe_tag_mm',
			    'size' => 10,
			    'autoSizeMax' => 5,
			    'maxitems' => 99,
			    'multiple' => 0,
                   ],
	    ],
	   'amazonads' => [
	       'exclude' => true,
	       'label' =>'LLL:EXT:recipeblog/Resources/Private/Language/locallang_db.xlf:tx_recipeblog_domain_model_recipe.amazonads',
	       'config' => [
			    'type' => 'select',
			    'renderType' => 'selectMultipleSideBySide',
			    'foreign_table' => 'tx_recipeblog_domain_model_amazonad',
			    'MM' => 'tx_recipeblog_recipe_amazonad_mm',
			    'size' => 10,
			    'autoSizeMax' => 5,
			    'maxitems' => 9,
			    'multiple' => 0,
			],
	    ],
            'steps' => array(
			'exclude' => 1,
			'label' => 'Cooking Steps',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_recipeblog_domain_model_cookingstep',
				'foreign_field' => 'recipe',
                                'foreign_sortby' => 'sorting',
				'maxitems'      => 99,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
            'ingredients' => array(
			'exclude' => 1,
			'label' => 'Ingredients',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_recipeblog_domain_model_recipeingredient',
				'foreign_field' => 'recipe',
				'maxitems'      => 999,
				'appearance' => array(
					'collapseAll' => 1,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
    ]
];
