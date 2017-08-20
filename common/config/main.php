<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    /*-ptr.nov- : Public Modules All*/
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            'i18n' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@kvgrid/messages',
                'forceTranslation' => true
            ],
        ],
       'markdown' => [
            'class' => 'kartik\markdown\Module',
            'previewAction' => '/markdown/parse/preview',

            // the controller action route used for downloading the markdown exported file
            'downloadAction' => '/markdown/parse/download',

            // the list of custom conversion patterns for post processing
            'customConversion' => [
                '<table>' => '<table class="table table-bordered table-striped">'
            ],

            // whether to use PHP SmartyPantsTypographer to process Markdown output
            'smartyPants' => true,
        ],  
		/* 'datecontrol' =>  [
			'displaySettings' => [
				'Module::FORMAT_DATE' => 'dd-mm-yyyy',
				'Module::FORMAT_TIME' => 'HH:mm:ss a',
				'Module::FORMAT_DATETIME' => 'dd-MM-yyyy HH:mm:ss a', 
			],
			// set your display timezone
			'displayTimezone' => 'Asia/Jakarta',

			// set your timezone for date saved to db
			'saveTimezone' => 'UTC',
			
			// automatically use kartik\widgets for each of the above formats
			'autoWidget' => true,
			
			// use ajax conversion for processing dates from display format to save format.
			'ajaxConversion' => true
		] */
    ],
	/*-ptr.nov- : Public Parm FOND AWSOME*/
    'params' => [ 
		'maskMoneyOptions' => [
			'prefix' => 'Rp ',
			'suffix' => '',
			'affixesStay' => true,
			'thousands' => ',',
			'decimal' => '.',
			'precision' => 2, 
			'allowZero' => false,
			'allowNegative' => false,
		],
		//$params,
			'icon-framework' => 'fa',  // Font Awesome Icon framework
			'HRD_EMP_UploadUrl'=>'/var/www/advanced/lukisongroup/web/upload/hrd/Employee/',
	],
];
