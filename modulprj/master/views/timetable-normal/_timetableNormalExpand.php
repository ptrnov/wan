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
			// 'TT_ID',
            // 'TT_GRP_ID',
            // 'TT_TYP',
            // 'TT_TYP_KTG',
            // 'TT_SDAYS',
            // 'TT_EDAYS',
            // 'TT_SDATE',
            // 'TT_EDATE',
            // 'TT_NOTE',
            // 'TT_UPDT',
            // 'TT_ACTIVE',
            // 'RULE_IN',
            // 'RULE_OUT',
            // 'RULE_TOL_IN',
            // 'RULE_TOL_OUT',
            // 'RULE_BRK_OUT',
            // 'RULE_BRK_IN',
            // 'RULE_DRT_OT_DPN',
            // 'RULE_DRT_OT_BLK',
            // 'RULE_DURATION',
            // 'RULE_FRK_DAY',
            // 'LEV1_FOT_HALF',
            // 'LEV1_FOT_HOUR',
            // 'LEV1_FOT_MAX',
            // 'LEV1_FOT_MAX_TIME',
            // 'LEV2_FOT_HALF',
            // 'LEV2_FOT_HOUR',
            // 'LEV2_FOT_MAX',
            // 'LEV2_FOT_MAX_TIME',
            // 'LEV3_FOT_HALF',
            // 'LEV3_FOT_HOUR',
            // 'LEV3_FOT_MAX',
            // 'LEV3_FOT_MAX_TIME',
            // 'KOMPENSASI',
	$aryField= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'TT_GRP_ID','SIZE' => '20px','label'=>'Category','align'=>'left','mergeHeader'=>true]],
		['ID' =>1, 'ATTR' =>['FIELD'=>'TT_TYP_KTG','SIZE' => '10px','label'=>'Type','align'=>'left','mergeHeader'=>true]],		
		['ID' =>2, 'ATTR' =>['FIELD'=>'TT_SDAYS','SIZE' => '20px','label'=>'Day Of Start','align'=>'left','mergeHeader'=>true]],
		['ID' =>3, 'ATTR' =>['FIELD'=>'TT_EDAYS','SIZE' => '20px','label'=>'Day Of End','align'=>'left','mergeHeader'=>true]],
		['ID' =>4, 'ATTR' =>['FIELD'=>'RULE_IN','SIZE' => '10px','label'=>'TimeIn','align'=>'center','mergeHeader'=>false]],
		['ID' =>5, 'ATTR' =>['FIELD'=>'RULE_OUT','SIZE' => '10px','label'=>'TimeOut','align'=>'center','mergeHeader'=>false]],
		['ID' =>6, 'ATTR' =>['FIELD'=>'RULE_TOL_IN','SIZE' => '10px','label'=>'Late','align'=>'center','mergeHeader'=>false]],
		['ID' =>7, 'ATTR' =>['FIELD'=>'RULE_TOL_OUT','SIZE' => '10px','label'=>'Early','align'=>'center','mergeHeader'=>false]],
		['ID' =>8, 'ATTR' =>['FIELD'=>'RULE_BRK_OUT','SIZE' => '10px','label'=>'BreakOut','align'=>'center','mergeHeader'=>false]],
		['ID' =>9, 'ATTR' =>['FIELD'=>'RULE_BRK_IN','SIZE' => '10px','label'=>'BreakIn','align'=>'center','mergeHeader'=>false]],		
		['ID' =>10, 'ATTR' =>['FIELD'=>'TT_SDATE','SIZE' => '20px','label'=>'Start Range','align'=>'center','mergeHeader'=>false]],
		['ID' =>11, 'ATTR' =>['FIELD'=>'TT_EDATE','SIZE' => '20px','label'=>'End Range','align'=>'center','mergeHeader'=>false]],
		['ID' =>12, 'ATTR' =>['FIELD'=>'TT_NOTE','SIZE' => '100px','label'=>'Desctiption','align'=>'left','mergeHeader'=>false]],
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
					'background-color'=>'rgba(74, 206, 231, 1)',
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
			'mergeHeader'=>$value[$key]['mergeHeader'],
			'noWrap'=>true,			
			'headerOptions'=>[		
					'style'=>[									
					'text-align'=>'center',
					'width'=>$value[$key]['FIELD'],
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(74, 206, 231, 1)',
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
	
	$ttOvertime= GridView::widget([
		'id'=>'tt-view-overtime',
		'dataProvider' => $dataProviderOt,
		//'filterModel' => $searchModelOt,
		'columns' =>$attDinamik,
		'toolbar' =>false,
		'panel'=>[
			'heading'=>false,
			'type'=>'info',
			'footer'=>false,
		],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'tt-view-overtime',
			],
		],
		'summary'=>false,
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true,
	]);
?>
	<?=$ttOvertime?>
