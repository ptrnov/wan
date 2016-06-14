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
		['ID' =>0, 'ATTR' =>['FIELD'=>'cabOne.CAB_NM','SIZE' => '10px','label'=>'Cabang','align'=>'left']],
		['ID' =>1, 'ATTR' =>['FIELD'=>'KAR_ID','SIZE' => '10px','label'=>'Employee.ID','align'=>'left']],		  
		['ID' =>2, 'ATTR' =>['FIELD'=>'KAR_NM','SIZE' => '20px','label'=>'Name','align'=>'left']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'deptOne.DEP_NM','SIZE' => '20px','label'=>'Department','align'=>'left']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'jabOne.JAB_NM','SIZE' => '20px','label'=>'Jabatan','align'=>'left']],
		['ID' =>5, 'ATTR' =>['FIELD'=>'stsOne.KAR_STS_NM','SIZE' => '20px','label'=>'Status','align'=>'left']],
		['ID' =>6, 'ATTR' =>['FIELD'=>'golonganOne.TT_GRP_NM','SIZE' => '10px','label'=>'Golongan','align'=>'left']],
		//['ID' =>7, 'ATTR' =>['FIELD'=>'KAR_TGLM','SIZE' => '10px','label'=>'Join.Date','align'=>'center']],
		
	  
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
		
	/*OTHER ATTRIBUTE*/
	foreach($valFields as $key =>$value[]){
		$filterWidgetOpt='';
		//$filterInputOpt='';
		if ($value[$key]['FIELD']=='deptOne.DEP_NM'){				
			//$gvfilterType=GridView::FILTER_SELECT2;
			//$gvfilterType=false;
			$gvfilter =$aryDept;
			/* $filterWidgetOpt=[				
				'pluginOptions'=>['allowClear'=>true],	
				//'placeholder'=>'Any author'					
			]; */
			//$filterInputOpt=['placeholder'=>'Any author'];
		}elseif($value[$key]['FIELD']=='cabOne.CAB_NM'){
			$gvfilterType=false;
			$gvfilter =$aryCbg;
		}elseif($value[$key]['FIELD']=='jabOne.JAB_NM'){
			$gvfilterType=false;
			$gvfilter =$aryJab;
		}elseif($value[$key]['FIELD']=='stsOne.KAR_STS_NM'){
			$gvfilterType=false;
			$gvfilter =$aryStt;
		}elseif($value[$key]['FIELD']=='golonganOne.TT_GRP_NM'){
			$gvfilterType=false;
			$gvfilter=$aryGol;
		}/* elseif($value[$key]['FIELD']=='KAR_TGLM'){
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
		
	$emp_resign= GridView::widget([
		'id'=>'resign-emp',
		'dataProvider' => $dataProvider1,
		'filterModel' => $searchModel1,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			'{export}',
		],	
		'panel'=>false,
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'resign-emp',
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

	<?=$emp_resign?>
