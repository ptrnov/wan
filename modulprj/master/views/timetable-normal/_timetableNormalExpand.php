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
            // 'RULE_DURATION',
            // 'RULE_FRK_DAY',
            // 'LEV1_FOT_HALF',
            // 'LEV1_FOT_HOUR',
            // 'LEV1_FOT_MAX',
            // 'LEV1_FOT_MAX_TIME',
            // 'KOMPENSASI',
	$aryFieldOt= [
		//['ID' =>0, 'ATTR' =>['FIELD'=>'TT_GRP_ID','SIZE' => '20px','label'=>'Category','align'=>'left','mergeHeader'=>true]],
		['ID' =>0, 'ATTR' =>['FIELD'=>'KtgNm','SIZE' => '20px','label'=>'Category','align'=>'left','mergeHeader'=>true]],
		['ID' =>1, 'ATTR' =>['FIELD'=>'vTT_SDAYS','SIZE' => '20px','label'=>'Day Of Start','align'=>'left','mergeHeader'=>true]],
		['ID' =>2, 'ATTR' =>['FIELD'=>'vTT_EDAYS','SIZE' => '20px','label'=>'Day Of End','align'=>'left','mergeHeader'=>true]],
		['ID' =>3, 'ATTR' =>['FIELD'=>'TT_SDATE','SIZE' => '20px','label'=>'Start Range','align'=>'center','mergeHeader'=>false]],
		['ID' =>4, 'ATTR' =>['FIELD'=>'TT_EDATE','SIZE' => '20px','label'=>'End Range','align'=>'center','mergeHeader'=>false]],
		['ID' =>5, 'ATTR' =>['FIELD'=>'RULE_IN','SIZE' => '10px','label'=>'TimeIn','align'=>'center','mergeHeader'=>false]],
		['ID' =>6, 'ATTR' =>['FIELD'=>'RULE_OUT','SIZE' => '10px','label'=>'TimeOut','align'=>'center','mergeHeader'=>false]],			
		['ID' =>7, 'ATTR' =>['FIELD'=>'LEV1_FOT_HALF','SIZE' => '100px','label'=>'% OT HALF','align'=>'left','mergeHeader'=>false]],
		['ID' =>8, 'ATTR' =>['FIELD'=>'LEV1_FOT_HOUR','SIZE' => '100px','label'=>'% OT HOUR','align'=>'left','mergeHeader'=>false]],
		['ID' =>9, 'ATTR' =>['FIELD'=>'LEV1_FOT_MAX','SIZE' => '100px','label'=>'% OT MAX','align'=>'left','mergeHeader'=>false]],
		['ID' =>10, 'ATTR' =>['FIELD'=>'RULE_DURATION','SIZE' => '100px','label'=>'WORK TIME','align'=>'left','mergeHeader'=>false]],
		['ID' =>11, 'ATTR' =>['FIELD'=>'LEV1_FOT_MAX_TIME','SIZE' => '100px','label'=>'TIME OT MAX','align'=>'left','mergeHeader'=>false]],
	];	
	$valFieldsOt = ArrayHelper::map($aryFieldOt, 'ID', 'ATTR'); 
	
	/*
	 * GRIDVIEW COLUMN
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	*/	
	$attDinamikOt =[];
	/*NO ATTRIBUTE*/
	$attDinamikOt[] =[			
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
					'background-color'=>'rgba(228, 228, 88, 0.6)',
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
	foreach($valFieldsOt as $key =>$value[]){			
		$attDinamikOt[]=[		
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
					'background-color'=>'rgba(228, 228, 88, 0.6)',
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
		'dataProvider' => $dataProviderOtExpand,
		//'filterModel' => $searchModelOtExpand,
		'columns' =>$attDinamikOt,
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

