<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\helpers\Url;

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
			[
				'class' => 'kartik\grid\ActionColumn', 
				'template' => '{view}',
				'header'=>'Action',
				'buttons' => [
					'view' =>function($url, $model, $key){
							return  Html::button(Yii::t('app', 'view'),
								['value'=>url::to(['/master/dept/view-dept','id'=>$model->DEP_ID]),
								'id'=>'modalButtonDept',
								'class'=>"btn btn-primary btn-xs",			
								'style'=>['width'=>'40px', 'height'=>'25px'],
							]);
					},					
				],
				'headerOptions'=>[					
					'style'=>[
						'vAlign'=>'bottem',
						'text-align'=>'center',
						'width'=>'5px',
						'font-family'=>'verdana, arial, sans-serif',
						'font-size'=>'9pt',
						'background-color'=>'rgba(97, 211, 96, 0.3)',
					]
				],
				'contentOptions'=>[
					'style'=>[
						'text-align'=>'center',
						'width'=>'5px',
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
						'width'=>'250px',
						'font-family'=>'verdana, arial, sans-serif',
						'font-size'=>'9pt',
						'background-color'=>'rgba(97, 211, 96, 0.3)',
					]
				],
				'contentOptions'=>[
					'style'=>[
						'text-align'=>'left',
						'width'=>'250px',
						'font-family'=>'tahoma, arial, sans-serif',
						'font-size'=>'9pt',
					]
				],
				'footer'=>true,
			],

		],
		'toolbar'=>false,		
		'panel'=>[
            'heading' =>'<h3 class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:9pt;text-align:left;"><b>DEPARTMENT</b></h3>',
            'type' =>GridView::TYPE_INFO,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'add Dept'),
                    ['/master/dept/create-dept'], 
					[
						'id'=>'create-dept',
						'data-toggle'=>'modal',
						'data-target'=>'#create-dept-id',
						'class' => 'btn btn-info btn-sm'
					]),
			'footer'=>false,
			
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




