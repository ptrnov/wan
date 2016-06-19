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
		['ID' =>0, 'ATTR' =>['FIELD'=>'FOT_NM','SIZE' => '20px','label'=>'ID','align'=>'left']],
		['ID' =>1, 'ATTR' =>['FIELD'=>'FOT_JAM1','SIZE' => '10px','label'=>'START TIME','align'=>'center']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'FOT_JAM2','SIZE' => '20px','label'=>'END TIME','align'=>'center']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'FOT_PERSEN','SIZE' => '10px','label'=>'PERSEN HARI','align'=>'right']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'DCRIP','SIZE' => '10px','label'=>'DESCRIPTION','align'=>'left']],
	];	
	$valFields = ArrayHelper::map($aryField, 'ID', 'ATTR'); 
	
	/*
	 * GRIDVIEW COLUMN
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	*/	
	$attDinamik =[];
		
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
	
	$ttOptStatus= GridView::widget([
		'id'=>'timetable-formula',
		'dataProvider' => $dataProviderFormula,
		'filterModel' => $searchModelFormula,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			''//'{export}',
		],	
		'panel'=>[
			'heading'=>'<h3 class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:9pt;text-align:left;"><b>FORMULA OVERTIME</b></h3>',
			//'heading'=>false,
			'type'=>'warning',
			'footer'=>false,
		],
		'summary'=>false,
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'timetable-formula',
			],
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true,
	]);
?>
<div class="row">
<div class="col-lg-2">
</div>
<div class="col-lg-8">
	<?=$ttOptStatus?>
</div>
</div>





