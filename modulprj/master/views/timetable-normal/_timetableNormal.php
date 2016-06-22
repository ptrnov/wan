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

use modulprj\master\models\TimetableOvertimeSearch;

	// 'TT_ID',,'TT_GRP_ID','TT_TYP_KTG','TT_SDAYS','TT_EDAYS','TT_SDATE','TT_EDATE','TT_NOTE','TT_UPDT','TT_ACTIVE','RULE_IN','RULE_OUT','RULE_TOL_IN',
    // 'RULE_TOL_OUT','RULE_BRK_OUT','RULE_BRK_IN','RULE_DRT_OT_DPN','RULE_DRT_OT_BLK','RULE_DURATION','RULE_FRK_DAY','LEV1_FOT_HALF','LEV1_FOT_HOUR', 'LEV1_FOT_MAX',
    // 'LEV1_FOT_MAX_TIME','LEV2_FOT_HALF','LEV2_FOT_HOUR','LEV2_FOT_MAX','LEV2_FOT_MAX_TIME','LEV3_FOT_HALF','LEV3_FOT_HOUR','LEV3_FOT_MAX','LEV3_FOT_MAX_TIME','KOMPENSASI',
 
	$aryField= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'grpNm','SIZE' => '20px','label'=>'Category','align'=>'left','mergeHeader'=>true]],
		['ID' =>1, 'ATTR' =>['FIELD'=>'ktgNm','SIZE' => '10px','label'=>'Type','align'=>'left','mergeHeader'=>true]],		
		['ID' =>2, 'ATTR' =>['FIELD'=>'VTT_SDAYS','SIZE' => '20px','label'=>'Day Of Start','align'=>'left','mergeHeader'=>true]],
		['ID' =>3, 'ATTR' =>['FIELD'=>'VTT_EDAYS','SIZE' => '20px','label'=>'Day Of End','align'=>'left','mergeHeader'=>true]],
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
	/*GRIDVIEW EXPAND*/
	$attDinamik[]=[	
		'class'=>'kartik\grid\ExpandRowColumn',
		'width'=>'50px',
		'header'=>'Detail',
		'value'=>function ($model, $key, $index, $column) {
			return GridView::ROW_COLLAPSED;
		},
		'detail'=>function ($model, $key, $index, $column){
			$searchModelOt = new TimetableOvertimeSearch([
				'TT_GRP_ID'=>''.$model['TT_GRP_ID'],
			]);
			$dataProviderOt = $searchModelOt->search(Yii::$app->request->queryParams);
			return Yii::$app->controller->renderPartial('_timetableNormalExpand',[
				//'searchModelOt' => $searchModelOt,
				'dataProviderOt' => $dataProviderOt,			
			]);
		},					
		'expandOneOnly'=>true,
		'headerOptions'=>[
			'style'=>[
				
				'text-align'=>'center',
				'width'=>'10px',
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'9pt',
				'background-color'=>'rgba(74, 206, 231, 1)',
			]
		],
		'contentOptions'=>[
			'style'=>[
			
				'text-align'=>'center',
				'width'=>'10px',
				'height'=>'10px',
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'9pt',
			]
		],
	];
	
	/*ACTION ATTRIBUTE*/
	$attDinamik[]=[
		'class'=>'kartik\grid\ActionColumn',
		'dropdown' => true,
		'template' => '{view}{overtime}',
		'dropdownOptions'=>['class'=>'pull-left dropdown'],
		'dropdownButton'=>['class'=>'btn btn-default btn-xs'],
		'buttons' => [				
			'overtime' =>function($url, $model, $key) {
					//$gF=getPermissionEmp()->GF_ID;
					//if ($gF<=4){
						return  '<li>' . Html::a('<span class="fa fa-money fa-dm"></span>'.Yii::t('app', 'Set Overtime'),
												['/master/timetable-normal/create-overtime','id'=>$model->TT_ID],[
												'data-toggle'=>"modal",
												'data-target'=>"#set-overtime",
												]). '</li>' . PHP_EOL;
					//}
			},
			'view' =>function($url, $model, $key){
					return  '<li>' .Html::button('<span class="fa fa-eye fa-dm"></span>  '.Yii::t('app', 'View'),
												['value'=>url::to(['/master/timetable-normal/view','id'=>$model->TT_ID]),
												'id'=>'modalButton',													
												'style'=>['width'=>'100%','text-align'=>'left','border'=>0, 'background-color'=>'white', 'padding-left'=>'20px'],
												]). '</li>' . PHP_EOL; 
			},
		],
		'headerOptions'=>[
			'style'=>[
				'text-align'=>'center',
				'width'=>'10px',
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'9pt',
				'background-color'=>'rgba(74, 206, 231, 1)',
			]
		],
		'contentOptions'=>[
			'style'=>[
				'text-align'=>'center',
				'width'=>'10px',
				'height'=>'10px',
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'9pt',
			]
		],
	
	];
	
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
		$filterWidgetOpt='';
		//$filterInputOpt='';
		/* if ($value[$key]['FIELD']=='depNm'){				
			//$gvfilterType=GridView::FILTER_SELECT2;
			//$gvfilterType=false;
			// $gvfilter =$aryDeptId;
			 // $filterWidgetOpt=[				
				// 'pluginOptions'=>['allowClear'=>true],	
				'placeholder'=>'Any author'					
			// ]; 
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
		}else{
			$gvfilterType=false;
			$gvfilter=true;
			$filterWidgetOpt=false;		
			//$filterInputOpt=false;						
		}; */				
			
		$attDinamik[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			/* 'filterType'=>$gvfilterType,
			'filter'=>$gvfilter,
			'filterWidgetOptions'=>$filterWidgetOpt, */	
			//'filterInputOptions'=>$filterInputOpt,				
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
	
	$ttNormal= GridView::widget([
		'id'=>'timetable-normal',
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'filterRowOptions'=>['style'=>'background-color:rgba(74, 206, 231, 1); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			''//'{export}',
		],	
		'panel'=>[
			//'heading'=>'<h3 class="panel-title">Employee List</h3>',
			'heading'=>false,
			'type'=>'warning',
			'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Add',
									['modelClass' => 'Kategori',]),'/master/timetable-normal/create',[
										'data-toggle'=>"modal",
										'data-target'=>"#tt-add",
										'class' => 'btn btn-success btn-sm'
									]
						).' '.
						Html::a('<i class="fa fa-history "></i> '.Yii::t('app', 'Refresh'),
									'/master/timetable-normal/',
									[
									  // 'id'=>'refresh-cust',
									   'class' => 'btn btn-info btn-sm',
									   //'data-pjax'=>false,
									]
						).' '.
						Html::a('<i class="fa fa-file-excel-o"></i> '.Yii::t('app', 'Export'),
									'/export/timetable-normal',
									[
										'class' => 'btn btn-info btn-sm'
									]
						),
						'showFooter'=>false,
		],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'timetable-normal',
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
		// 'floatHeaderOptions'=>['scrollingTop'=>'200'] 
	]);
?>
	<?=$ttNormal?>







