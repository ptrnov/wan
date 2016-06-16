<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use modulprj\assets\AppAsset; 	
AppAsset::register($this);
use modulprj\master\models\Dept;

	/*DEPARTMENT Author: -ptr.nov */
	//print_r($dataProvider);
	$gv_dept= GridView::widget([
		'id'=>'id-dept',
		'dataProvider' => $dataProvider_Dept,
		'filterModel' => $searchModel_Dept,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],	
		'columns' => [
           [
				'class'=>'kartik\grid\SerialColumn',
				'contentOptions'=>['class'=>'kartik-sheet-style'],
				'width'=>'10px',
				'header'=>'No.',
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
			//'DEP_ID',
			[
				'attribute'=>'DEP_NM',
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
						'text-align'=>'left',
						'width'=>'150px',
						'font-family'=>'tahoma, arial, sans-serif',
						'font-size'=>'9pt',
					]
				],
				'footer'=>true,
			],

		],
		'toolbar'=>false,
		
		'panel'=>[
            'heading' =>'<h8>DEPARTMENT</h8>',
            'type' =>GridView::TYPE_PRIMARY,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'add'),
                    ['#'], ['class' => 'btn btn-info btn-sm']),
			
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'options'=>[
                'enablePushState'=>false,
                'id'=>'id-dept',
            ],
        ],
		'summary'=>false,
        'hover'=>true, //cursor select
        'responsive'=>true,
        'bordered'=>true,
        'striped'=>true,       
	]);
?>
	<?=$gv_dept?>




