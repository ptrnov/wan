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

	/*DEPARTMENT Author: -ptr.nov */
	//print_r($dataProvider);
	$gv_kepangkatan= GridView::widget([
		'id'=>'id-kepangkatan',
		'dataProvider' => $dataProvider_Gf,
		'filterModel' => $searchModel_Gf,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],	
		'columns' => [
			[
				'class' => 'kartik\grid\ActionColumn', 
				'template' => '{view}',
				'header'=>'Action',
				'buttons' => [
					'view' =>function($url, $model, $key){
							return  Html::button(Yii::t('app', 'view'),
								['value'=>url::to(['/master/dept/view-kepangkatan','id'=>$model->ID]),
								'id'=>'modalButtonKepangkatan',
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
			[
				'attribute'=>'GF_ID',
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
				'attribute'=>'GF_NM',
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
            'heading' =>'<h3 class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:9pt;text-align:left;"><b>GROUP FUNCTION/LEVEL</b></h3>',
            'type' =>GridView::TYPE_INFO,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'add Level'),
                    ['/master/dept/create-gfnc'], 
					[
						'id'=>'create-gf',
						'data-toggle'=>'modal',
						'data-target'=>'#create-gf-id',
						'class' => 'btn btn-success btn-sm'
					]),
			'footer'=>false,
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'options'=>[
                'enablePushState'=>false,
                'id'=>'id-kepangkatan',
            ],
        ],
		'summary'=>false,
        'hover'=>true, //cursor select
        'responsive'=>true,
        'bordered'=>true,
        'striped'=>true,
        //'autoXlFormat'=>true,
        'export'=>[	//export like view grid --ptr.nov-
            'fontAwesome'=>true,
            'showConfirmAlert'=>false,
            'target'=>GridView::TARGET_BLANK
        ],
	]);
?>
	<?=$gv_kepangkatan?>




