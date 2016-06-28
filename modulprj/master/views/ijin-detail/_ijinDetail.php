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
		['ID' =>0, 'ATTR' =>['FIELD'=>'empNm','SIZE' => '20%','label'=>'Employee','align'=>'left','mergeHeader'=>false,'vAlign'=>'middle']],
		['ID' =>1, 'ATTR' =>['FIELD'=>'cabNm','SIZE' => '10%','label'=>'Cabang','align'=>'left','mergeHeader'=>false,'vAlign'=>'middle']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'depNm','SIZE' => '10%','label'=>'Exception','align'=>'left','mergeHeader'=>false,'vAlign'=>'middle']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'ijinNm','SIZE' => '10%','label'=>'Exception','align'=>'left','mergeHeader'=>false,'vAlign'=>'middle']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'IJN_SDATE','SIZE' => '5%','label'=>'Start Date','align'=>'left','mergeHeader'=>false,'vAlign'=>'top']],
		['ID' =>5, 'ATTR' =>['FIELD'=>'IJN_EDATE','SIZE' => '5%','label'=>'End Date','align'=>'left','mergeHeader'=>true,'vAlign'=>'top']],
		['ID' =>6, 'ATTR' =>['FIELD'=>'IJN_NOTE','SIZE' => '40%','label'=>'Note','align'=>'left','mergeHeader'=>true,'vAlign'=>'middle']],
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
						['value'=>url::to(['/master/ijin-detail/view','id'=>$model->ID]),
						'id'=>'modalButtonIjin',
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
		$filterWidgetOpt='';
		if ($value[$key]['FIELD']=='empNm'){				
			$gvfilterType=GridView::FILTER_SELECT2;
			//$gvfilterType=false;
			$gvfilter =true;
			$filterWidgetOpt=[	
				'data'=>$aryKaryawan,			
				'pluginOptions'=>['allowClear'=>true,'placeholder'=>'Cari Employee'],	
			];
			$filterOptCspn=1;
			$filterColor='rgba(97, 211, 96,1)';
		}elseif($value[$key]['FIELD']=='ijinNm'){
			$gvfilterType=false;
			$gvfilter =$aryIjinHeader;
			$filterOptCspn=1;
			$filterColor='rgba(97, 211, 96,1)';
		}elseif($value[$key]['FIELD']=='cabNm'){
			$gvfilterType=false;
			$gvfilter =$aryCbg;
			$filterOptCspn=1;
			$filterColor='rgba(97, 211, 96,1)';
		}elseif($value[$key]['FIELD']=='depNm'){
			$gvfilterType=false;
			$gvfilter =$aryDep;
			$filterOptCspn=1;
			$filterColor='rgba(97, 211, 96,1)';
		}elseif($value[$key]['FIELD']=='IJN_SDATE'){
			$gvfilterType=GridView::FILTER_DATE_RANGE;
			$gvfilter =true;
			$filterWidgetOpt=[
				//'attribute' =>'IJN_SDATE',
				//'presetDropdown'=>true,
				'convertFormat'=>true,
				'pluginOptions'=>[
				'timePicker'=>true,
				'timePickerIncrement'=>30,
					//'format' => 'yyyy-mm-dd',
					//'separator' => ' - ',
					'opens'=>'left',
					'autoclose' => true,
					'todayHighlight' => true,
					'contentOptions'=>[
						'style'=>[
						  'text-align'=>'left',
						  'font-family'=>'tahoma, arial, sans-serif',
						  'font-size'=>'8pt',
						]
					]
				],				
			]; 
			$filterOptCspn=2;
			$filterColor='rgba(97, 211, 96,1)';
			//$filterColor='white';
		}elseif($value[$key]['FIELD']=='IJN_EDATE'){
			$filterColor='rgba(97, 211, 96, 0.0)';
			$gvfilterType=false;
			$gvfilter =false;
			$filterOptCspn=1;
		}elseif($value[$key]['FIELD']=='IJN_NOTE'){
			$gvfilterType=false;
			$gvfilter =false;
			$filterOptCspn=false;
			$filterColor='rgba(97, 211, 96,1)';
		}else{
			$gvfilterType=false;
			$gvfilter=false;
			$filterWidgetOpt=false;		
			//$filterInputOpt=false;
			$filterOptCspn=1;
			$filterColor=false;
		};
		
		$attDinamik[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'hAlign'=>'right',
			'vAlign'=>$value[$key]['vAlign'],
			'filter'=>$gvfilter,
			'filterType'=>$gvfilterType,
			'filterWidgetOptions'=>$filterWidgetOpt,
			'filterOptions'=>[
				'colspan'=>$filterOptCspn,
				'style'=>['background-color'=>$filterColor],
			],			
			'mergeHeader'=>$value[$key]['mergeHeader'],
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
			/* 'pageSummaryOptions' => [
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
			],	 */
		];	
	};	
	
	$ijinDetail= GridView::widget([
		'id'=>'exception-detail',
		'dataProvider' => $dataProviderDetail,
		'filterModel' => $searchModelDetail,
		//'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],
		/* 'filterRowOptions'=>//['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],	
		[
						'columns'=>[
							['content'=>'', 'options'=>['colspan'=>1,'class'=>'text-center info',]], 
							['content'=>'Quantity', 'options'=>['colspan'=>1, 'class'=>'text-center info']], 
							['content'=>'Remark', 'options'=>['colspan'=>1, 'class'=>'text-center info']], 
							//['content'=>'Action Status ', 'options'=>['colspan'=>1,  'class'=>'text-center info']], 
						],
					],	 */	
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
									['/master/ijin-detail'],
									[
										'data-toggle'=>'modal',
										'class' => 'btn btn-info btn-sm',
									]
						).' '.
						Html::a('<i class="fa fa-file-excel-o"></i> '.Yii::t('app', 'Export'),
									'/export/employe',
									[
										'class' => 'btn btn-info btn-sm'
									]
						),
						'footer'=>false,
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
