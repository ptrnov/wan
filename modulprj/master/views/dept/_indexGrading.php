<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\bootstrap\Modal;
use modulprj\assets\AppAsset; 	
AppAsset::register($this);

	$gv_kepangkatan= GridView::widget([
		'id'=>'id-grading',
		'dataProvider' => $dataProvider_Grading,
		'filterModel' => $searchModel_Grading,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],	
		'columns' => [
			[
				'attribute'=>'JOBGRADE_ID',
				'headerOptions'=>[
					'style'=>[
						'text-align'=>'center',
						'width'=>'10px',
						'font-family'=>'verdana, arial, sans-serif',
						'font-size'=>'9pt',
						'background-color'=>'rgba(97, 211, 96, 0.3)',
					]
				],
				'contentOptions'=>[
					'style'=>[
						'text-align'=>'center',
						'width'=>'10px',
						'font-family'=>'tahoma, arial, sans-serif',
						'font-size'=>'9pt',
					]
				],
			],
			[
				'attribute'=>'JOBGRADE_NM',
				'headerOptions'=>[
					'style'=>[
						'text-align'=>'center',
						'width'=>'250px',
						'font-family'=>'verdana, arial, sans-serif',
						'font-size'=>'9pt',
						'background-color'=>'rgba(97, 211, 96, 0.3)',
					]
				],
				'contentOptions'=>[
					'style'=>[
						'text-align'=>'left',
						'width'=>'150px',
						'font-family'=>'tahoma, arial, sans-serif',
						'font-size'=>'9pt',
					]
				],
			],

		],
		'toolbar'=>false,
		'panel'=>[
            'heading' =>'<h3 class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:9pt;text-align:left;"><b>GREADING/GOLONGAN</b></h3>',
            'type' =>GridView::TYPE_INFO,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'add Grading'),
                    ['/master/dept/create-grading'], 
					[
						'id'=>'create-grading',
						'data-toggle'=>'modal',
						'data-target'=>'#create-grading-id',
						'class' => 'btn btn-success btn-sm'
					]),
			'footer'=>false,
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'options'=>[
                'enablePushState'=>false,
                'id'=>'id-grading',
            ],
        ],
		'summary'=>false,
        'hover'=>true, //cursor select
        'responsive'=>true,
        'bordered'=>true,
        'striped'=>true,
	]);
?>
	<?=$gv_kepangkatan?>




