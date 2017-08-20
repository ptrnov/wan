<?php
use kartik\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;


	$aryField= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'CREATE_AT','SIZE' => '10px','label'=>'Date','align'=>'left']],		  
		['ID' =>1, 'ATTR' =>['FIELD'=>'PAY_DAY','SIZE' => '20px','label'=>'PayOfDay','align'=>'left']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'PAY_MONTH','SIZE' => '10px','label'=>'PayOfMonth','align'=>'left']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'PAY_TUNJANGAN','SIZE' => '10px','label'=>'Allowen','align'=>'left']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'PAY_EAT','SIZE' => '10px','label'=>'Eat','align'=>'left']],
		['ID' =>5, 'ATTR' =>['FIELD'=>'PAY_TRANPORT','SIZE' => '10px','label'=>'Transport','align'=>'left']],
		['ID' =>6, 'ATTR' =>['FIELD'=>'BONUS','SIZE' => '10px','label'=>'Bonus','align'=>'left']],
		['ID' =>7, 'ATTR' =>['FIELD'=>'PAY_ENTERTAIN','SIZE' => '10px','label'=>'Entertain','align'=>'left']],
		['ID' =>8, 'ATTR' =>['FIELD'=>'STATUS_ACTIVE','SIZE' => '10px','label'=>'Status','align'=>'left']],
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
		$filterWidgetOpt='';
		$gvfilterType=false;
		$gvfilter=true;
		$filterWidgetOpt=false;		
		//$filterInputOpt=false;										
			
		$attDinamik[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'filterType'=>$gvfilterType,
			'filter'=>$gvfilter,
			'filterWidgetOptions'=>$filterWidgetOpt,					
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

	$gvHistorySalary= GridView::widget([
		'id'=>'gv-history-salary',
		'dataProvider' => $dataProvider,
		//'filterModel' => $searchModel,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' =>false,
		'panel'=>[
            'heading' =>'<h3 class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:9pt;text-align:left;"><b>SALARY HISTORY</b></h3>',
            'type' =>GridView::TYPE_INFO,
			'footer'=>false,
        ],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'gv-history-salary',
			],
		],
		'summary'=>false,
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true,
	]);
?>


<?= $gvHistorySalary;?>