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


	/*
	 * PENGUNAAN DALAM GRID
	 * Arry Setting Attribute
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
		foreach($valFields as $key =>$value[])
		{
			print_r($value[0]['FIELD'].','.$value[0]['SIZE']);		//SATU
			print_r($value[$key]['FIELD'].','.$value[0]['SIZE']);	//ARRAY 0-end		
		} 
	*/	
	$aryField= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'KAR_ID','SIZE' => '8px','label'=>'Karyawan.Id','align'=>'left']],		  
		['ID' =>1, 'ATTR' =>['FIELD'=>'EmpNm','SIZE' => '10px','label'=>'Karyawan','align'=>'left']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'CabNm','SIZE' => '10px','label'=>'Cabang','align'=>'left']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'TerminalID','SIZE' => '20px','label'=>'Terminal','align'=>'left']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'FingerPrintID','SIZE' => '20px','label'=>'Finger','align'=>'left']],
		//['ID' =>6, 'ATTR' =>['FIELD'=>'timeTableNm','SIZE' => '10px','label'=>'Golongan','align'=>'left']],
	];	
	$valFields = ArrayHelper::map($aryField, 'ID', 'ATTR'); 
			
	$headerColor='rgba(128, 179, 178, 1)';

	/*
	 * GRIDVIEW COLUMN
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	*/	
	$attDinamikFinger =[];
	/*NO ATTRIBUTE*/
	$attDinamikFinger[] =[			
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
					'background-color'=>$headerColor,
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
		$filterWidgetOpt='';
		//$filterInputOpt='';
		if ($value[$key]['FIELD']=='depNm'){				
			//$gvfilterType=GridView::FILTER_SELECT2;
			//$gvfilterType=false;
			$gvfilter =$aryDeptId;
			/* $filterWidgetOpt=[				
				'pluginOptions'=>['allowClear'=>true],	
				//'placeholder'=>'Any author'					
			]; */
			//$filterInputOpt=['placeholder'=>'Any author'];
		}elseif($value[$key]['FIELD']=='cabNm'){
			$gvfilterType=false;
			$gvfilter =$aryCbgId;
		}elseif($value[$key]['FIELD']=='gfNm'){
			$gvfilterType=false;
			$gvfilter =$aryGfId;
		}elseif($value[$key]['FIELD']=='stsKerjaNm'){
			$gvfilterType=false;
			$gvfilter =$arySttId;
		}elseif($value[$key]['FIELD']=='gradingNm'){
			$gvfilterType=false;
			$gvfilter=$aryGradingId;
		}
		elseif($value[$key]['FIELD']=='timeTableNm'){
			$gvfilterType=false;
			$gvfilter=$aryTimeTableId;
		} /*elseif($value[$key]['FIELD']=='KAR_TGLM'){
			$gvfilterType=GridView::FILTER_DATE_RANGE;
			$gvfilter=true;
			$filterWidgetOpt=[
				//'attribute' =>'KAR_TGLM',
				'presetDropdown'=>TRUE,
				'convertFormat'=>true,
					'pluginOptions'=>[
						'format'=>'Y-m-d',
						'separator' => '-',
						'opens'=>'left'
					],
			];
		} */else{
			$gvfilterType=false;
			$gvfilter=true;
			$filterWidgetOpt=false;		
			//$filterInputOpt=false;						
		};				
			
		$attDinamikFinger[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'filterType'=>$gvfilterType,
			'filter'=>$gvfilter,
			'filterWidgetOptions'=>$filterWidgetOpt,	
			//'filterInputOptions'=>$filterInputOpt,				
			'hAlign'=>'right',
			'vAlign'=>'middle',
			//'mergeHeader'=>true,
			'noWrap'=>true,			
			'headerOptions'=>[		
					'style'=>[									
					'text-align'=>'center',
					'width'=>$value[$key]['SIZE'],
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>$headerColor,
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
		
	$emp_active= GridView::widget([
		'id'=>'finger-emp',
		'dataProvider' => $dataProviderFinger,
		'filterModel' => $searchModelFinger,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamikFinger,
		'toolbar' => [
			'{export}',
		],	
		'panel'=>[
			'heading'=>'<h3 class="panel-title">List Finger Per-Karyawan</h3>',
			'type'=>'default',
			'before'=>false,
			'footer'=>false,
		],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'finger-emp',
			],
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true,
		//'autoXlFormat'=>true,
		'export'=>[//export like view grid --ptr.nov-
			'fontAwesome'=>true,
			'showConfirmAlert'=>false,
			'target'=>GridView::TARGET_BLANK
		],
		//'floatHeader'=>false,
		 'floatHeaderOptions'=>['scrollingTop'=>'200'] 
	]);

?>

	<?=$emp_active?>
