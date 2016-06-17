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
		['ID' =>0, 'ATTR' =>['FIELD'=>'KAR_ID','SIZE' => '10px','label'=>'Employee.ID','align'=>'left']],		  
		['ID' =>1, 'ATTR' =>['FIELD'=>'KAR_NM','SIZE' => '20px','label'=>'Name','align'=>'left']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'cabNm','SIZE' => '10px','label'=>'Cabang','align'=>'left']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'depNm','SIZE' => '20px','label'=>'Department','align'=>'left']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'gfNm','SIZE' => '20px','label'=>'Group Function','align'=>'left']],
		['ID' =>5, 'ATTR' =>['FIELD'=>'gradingNm','SIZE' => '10px','label'=>'Grading','align'=>'left']],
		['ID' =>6, 'ATTR' =>['FIELD'=>'stsKerjaNm','SIZE' => '20px','label'=>'STATUS','align'=>'left']],
		['ID' =>7, 'ATTR' =>['FIELD'=>'timeTableNm','SIZE' => '20px','label'=>'TIME TABEL GROUP','align'=>'left']],
		//['ID' =>6, 'ATTR' =>['FIELD'=>'timeTableNm','SIZE' => '10px','label'=>'Golongan','align'=>'left']],
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
	
	/*ACTION ATTRIBUTE*/
	$attDinamik[]=[
		'class'=>'kartik\grid\ActionColumn',
		'dropdown' => true,
		'template' => '{view}{edit0}{edit1}{edit2}{edit3}{lihat}',
		'dropdownOptions'=>['class'=>'pull-left dropdown'],
		'dropdownButton'=>['class'=>'btn btn-default btn-xs'],
		'buttons' => [				
			'edit0' =>function($url, $model, $key){
					return  '<li>' . Html::a('<span class="fa fa-edit fa-dm"></span>'.Yii::t('app', 'Set Identity'),
												['/master/employe/edit-identity','id'=>$model->KAR_ID],[
												'data-toggle'=>"modal",
												'data-target'=>"#edit-title",
												'data-title'=> $model->KAR_ID,
												]). '</li>' . PHP_EOL;
			},
			'edit1' =>function($url, $model, $key){
					return  '<li>' . Html::a('<span class="fa fa-edit fa-dm"></span>'.Yii::t('app', 'Set Title'),
												['/master/employe/edit-titel','id'=>$model->KAR_ID],[
												'data-toggle'=>"modal",
												'data-target'=>"#edit-title",
												'data-title'=> $model->KAR_ID,
												]). '</li>' . PHP_EOL;
			},
			'edit2' =>function($url, $model, $key){
					return  '<li>' . Html::a('<span class="fa fa-edit fa-dm"></span>'.Yii::t('app', 'Set Profile'),
												['/master/employe/edit','id'=>$model->KAR_ID],[
												'data-toggle'=>"modal",
												'data-target'=>"#edit-profile",
												'data-title'=> $model->KAR_ID,
												]). '</li>' . PHP_EOL;
			},
			'edit3' =>function($url, $model, $key) {
					//$gF=getPermissionEmp()->GF_ID;
					//if ($gF<=4){
						return  '<li>' . Html::a('<span class="fa fa-money fa-dm"></span>'.Yii::t('app', 'Set Payroll'),
												['/master/employe/edit','id'=>$model->KAR_ID],[
												'data-toggle'=>"modal",
												'data-target'=>"#edit-payroll",
												]). '</li>' . PHP_EOL;
					//}
			},
			'view' =>function($url, $model, $key){
					return  '<li>' .Html::button('<span class="fa fa-eye fa-dm"></span>  '.Yii::t('app', 'View'),
												['value'=>url::to(['/master/employe/view','id'=>$model->KAR_ID]),
												'id'=>'modalButton',													
												'style'=>['width'=>'100%','text-align'=>'left','border'=>0, 'background-color'=>'white', 'padding-left'=>'20px'],
												]). '</li>' . PHP_EOL; 
												
												/* return  '<li>' .Html::a('<span class="fa fa-eye fa-dm"></span>'.Yii::t('app', 'View'),'',
												['value'=>url::to(['/master/employe/view?id='.$model->KAR_ID]),
												//['value'=>url::to(['/master/employe/view','id'=>$model->KAR_ID]),
												'id'=>'modalButton',
												//'data-toggle'=>"modal",
												//'data-target'=>"#modal-view",
												'data-title'=> $model->KAR_ID,
												//'data-ajax'=>true,
												]). '</li>' . PHP_EOL;  */
			},
		],
		'headerOptions'=>[
			'style'=>[
				'text-align'=>'center',
				'width'=>'10px',
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'9pt',
				'background-color'=>'rgba(97, 211, 96, 0.3)',
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
	/*IMG*/
	$attDinamik[] =[
			'attribute'=>'IMG64',
			'format'=>'raw', 
			'value'=>function($model){				
				$base64 ='data:image/jpg;charset=utf-8;base64,'.$model['IMG64'];
				//return Html::img($base64,['width'=>'100','height'=>'60','class'=>'img-circle']);
				return $model['IMG64']!=''?Html::img($base64,['class'=>'img-circle','width'=>'25','height'=>'25']):Html::img($model['notImg'],['class'=>'img-circle','width'=>'25','height'=>'25']);
			},
			'width'=>'10px',
			'mergeHeader'=>true,
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
			
		$attDinamik[]=[		
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
		
	$emp_active= GridView::widget([
		'id'=>'active-emp',
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			'{export}',
		],	
		'panel'=>[
			//'heading'=>'<h3 class="panel-title">Employee List</h3>',
			'heading'=>false,
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
									  // 'id'=>'refresh-cust',
									   'class' => 'btn btn-info btn-sm',
									   //'data-pjax'=>false,
									]
						).' '.
						Html::a('<i class="fa fa-file-excel-o"></i> '.Yii::t('app', 'Export'),
									'/export/employe',
									[
										//'id'=>'export-data',
										//'data-pjax' => true,
										'class' => 'btn btn-info btn-sm'
									]
						),
						'showFooter'=>false,
		],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'active-emp',
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
