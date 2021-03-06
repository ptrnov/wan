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
		['ID' =>0, 'ATTR' =>['FIELD'=>'LBR_ID','SIZE' => '20px','label'=>'ID','align'=>'left']],
		['ID' =>1, 'ATTR' =>['FIELD'=>'LBR_NM','SIZE' => '10px','label'=>'Name Holiday','align'=>'left']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'TAHUN','SIZE' => '10px','label'=>'Years','align'=>'left']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'LBR_SDATE','SIZE' => '20px','label'=>'Start Day ','align'=>'left']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'LBR_EDATE','SIZE' => '20px','label'=>'End Day','align'=>'left']],
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
	
	$holidayDetail= GridView::widget([
		'id'=>'libur-detail',
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			''//'{export}',
		],	
		'panel'=>[
			'heading'=>'<h3 class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:9pt;text-align:left;"><b>Holiday List</b></h3>',
			//'heading'=>false,
			'type'=>'warning',
			'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create Employee ',
									['modelClass' => 'Kategori',]),'/master/employe/create',[
										'data-toggle'=>"modal",
										'data-target'=>"#modal-create",
										'class' => 'btn btn-success btn-sm'
									]
						).' '.
						Html::a('<i class="fa fa-history "></i> '.Yii::t('app', 'Refresh'),
									'/master/employe/',
									[
									   'class' => 'btn btn-info btn-sm',
									]
						).' '.
						Html::a('<i class="fa fa-file-excel-o"></i> '.Yii::t('app', 'Export'),
									'/export/employe',
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
				'id'=>'libur-detail',
			],
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true
	]);
?>
	<?=$holidayDetail?>

