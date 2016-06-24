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
		['ID' =>0, 'ATTR' =>['FIELD'=>'empNm','SIZE' => '20%','label'=>'Employee','align'=>'left','mergeHeader'=>true]],
		['ID' =>1, 'ATTR' =>['FIELD'=>'ijinNm','SIZE' => '20%','label'=>'Exception','align'=>'left','mergeHeader'=>true]],
		['ID' =>2, 'ATTR' =>['FIELD'=>'IJN_SDATE','SIZE' => '5%','label'=>'Start Date','align'=>'left','mergeHeader'=>true]],
		['ID' =>3, 'ATTR' =>['FIELD'=>'IJN_EDATE','SIZE' => '5%','label'=>'End Date','align'=>'left','mergeHeader'=>true]],
		['ID' =>4, 'ATTR' =>['FIELD'=>'IJN_NOTE','SIZE' => '40%','label'=>'Note','align'=>'left','mergeHeader'=>true]],
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
		if ($value[$key]['FIELD']=='empNm'){				
			$gvfilterType=GridView::FILTER_SELECT2;
			//$gvfilterType=false;
			$gvfilter =true;
			$filterWidgetOpt=[	
				'data'=>$aryKaryawan,			
				'pluginOptions'=>['allowClear'=>true,'placeholder'=>'Cari Employee'],	
			];
		}elseif($value[$key]['FIELD']=='ijinNm'){
			$gvfilterType=false;
			$gvfilter =$aryIjinHeader;
		}else{
			$gvfilterType=false;
			$gvfilter=true;
			$filterWidgetOpt=false;		
			//$filterInputOpt=false;						
		};
		
		$attDinamik[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'filterType'=>$gvfilterType,
			'filter'=>$gvfilter,
			'filterWidgetOptions'=>$filterWidgetOpt,
			//'mergeHeader'=>true,
			'noWrap'=>true,			
			'headerOptions'=>[		
					'style'=>[									
					'text-align'=>'center',
					'width'=>$value[$key]['SIZE'],
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>'rgba(97, 211, 96, 0.3)',
				]
			],  
			'contentOptions'=>[
				'style'=>[
					'text-align'=>$value[$key]['align'],
					'width'=>$value[$key]['SIZE'],
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
	
	$ijinDetail= GridView::widget([
		'id'=>'exception-detail',
		'dataProvider' => $dataProviderDetail,
		'filterModel' => $searchModelDetail,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			''//'{export}',
		],	
		'panel'=>[
			//'heading'=>'<h3 class="panel-title">Employee List Exception</h3>',
			'heading'=>false,
			'type'=>'warning',
			'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Add Process Exception ',
									['modelClass' => 'Kategori',]),'/master/ijin-detail/create',[
										'data-toggle'=>"modal",
										'data-target'=>"#process-exception-add",
										'class' => 'btn btn-success btn-sm'
									]
						).' '.
						Html::a('<i class="fa fa-history "></i> '.Yii::t('app', 'Refresh'),
									'/master/ijin-detail/',
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
				'id'=>'exception-detail',
			],
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true
	]);
?>
	<?=$ijinDetail?>
