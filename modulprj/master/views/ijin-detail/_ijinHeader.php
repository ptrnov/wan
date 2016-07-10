<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\helpers\Url;

	$aryField= [
		//['ID' =>0, 'ATTR' =>['FIELD'=>'IJN_ID','SIZE' => '20px','label'=>'Id','align'=>'left']],
		['ID' =>0, 'ATTR' =>['FIELD'=>'IIJN_NM','SIZE' => '10px','label'=>'Exception','align'=>'left']],
		['ID' =>1, 'ATTR' =>['FIELD'=>'IJIN_KET','SIZE' => '10px','label'=>'Description','align'=>'left']],
	];	
	$valFields = ArrayHelper::map($aryField, 'ID', 'ATTR'); 
	
	/*
	 * GRIDVIEW COLUMN
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	*/	
	$attDinamik =[];
	/*NO ATTRIBUTE*/
	$attDinamik[] =[			
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
	];
	$attDinamik[] =[
		'class' => 'kartik\grid\ActionColumn', 
		'template' => '{view}',
		'header'=>'Action',
		'buttons' => [
			'view' =>function($url, $model, $key){
					return  Html::button(Yii::t('app', 'view'),
						['value'=>url::to(['/master/ijin-detail/view-header','id'=>$model->IJN_ID]),
						'id'=>'modalButtonIjinHeader',
						'class'=>"btn btn-primary btn-xs",			
						'style'=>['width'=>'40px', 'height'=>'25px'],
					]);
			},					
		],
		'headerOptions'=>[					
			'style'=>[
				'vAlign'=>'bottem',
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
	];
	/*OTHER ATTRIBUTE*/
	foreach($valFields as $key =>$value[]){
		$attDinamik[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'hAlign'=>'right',
			'vAlign'=>'middle',
			//'mergeHeader'=>true,
			'noWrap'=>true,			
			'headerOptions'=>[		
					'style'=>[									
					'text-align'=>'center',
					'width'=>$value[$key]['FIELD'],
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(97, 211, 96, 0.3)',
				]
			],  
			'contentOptions'=>[
				'style'=>[
					'text-align'=>$value[$key]['align'],
					//'width'=>'12px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					//'background-color'=>'rgba(13, 127, 3, 0.1)',
				]
			],
			//'pageSummaryFunc'=>GridView::F_SUM,
			//'pageSummary'=>true,
			'pageSummaryOptions' => [
				'style'=>[
						'text-align'=>'right',		
						//'width'=>'12px',
						'font-family'=>'tahoma',
						'font-size'=>'8pt',	
						'text-decoration'=>'underline',
						'font-weight'=>'bold',
						'border-left-color'=>'transparant',		
						'border-left'=>'0px',									
				]
			],	
		];	
	};	
	
	$ijinHeader= GridView::widget([
		'id'=>'exception-header',
		'dataProvider' => $dataProviderHeader,
		'filterModel' => $searchModelHeader,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			''//'{export}',
		],	
		'panel'=>[
			//'heading'=>'<h3 class="panel-title">Exception List</h3>',
			'heading'=>false,
			'type'=>'warning',
			'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add Exception',
									'/master/ijin-detail/create-header',
									[
										'data-toggle'=>"modal",
										'data-target'=>"#modal-create-header",
										'class' => 'btn btn-success btn-sm'
									]
						).' '.
						Html::a('<i class="fa fa-history "></i> Refresh',
									'/master/ijin-detail/index?tab=1',
									[
									   'class' => 'btn btn-info btn-sm',
									]
						).' '.
						Html::a('<i class="fa fa-file-excel-o"></i> Export',
									'/export/ijin-header',
									[
										'class' => 'btn btn-info btn-sm'
									]
						),
						'showFooter'=>false,
		],
		'summary'=>false,
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'exception-header',
			],
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true
	]);
?>
	<?=$ijinHeader?>
