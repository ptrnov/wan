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
		['ID' =>0, 'ATTR' =>['FIELD'=>'empNm','SIZE' => '20px','label'=>'Employee','align'=>'left']],
		['ID' =>1, 'ATTR' =>['FIELD'=>'PAY_DAY','SIZE' => '10px','label'=>'Upah Harian','align'=>'left']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'PAY_MONTH','SIZE' => '10px','label'=>'Upah Bulanan','align'=>'left']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'PAY_TUNJANGAN','SIZE' => '10px','label'=>'Tunjangan Jabatan','align'=>'left']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'PAY_TRANPORT','SIZE' => '10px','label'=>'Uang Transport','align'=>'left']],
		['ID' =>5, 'ATTR' =>['FIELD'=>'PAY_EAT','SIZE' => '10px','label'=>'Uang Makan','align'=>'left']],
		['ID' =>6, 'ATTR' =>['FIELD'=>'BONUS','SIZE' => '10px','label'=>'Bonus','align'=>'left']],
		['ID' =>7, 'ATTR' =>['FIELD'=>'PAY_ENTERTAIN','SIZE' => '10px','Uang Intertain'=>'Status','align'=>'left']],
		['ID' =>1, 'ATTR' =>['FIELD'=>'STATUS_ACTIVE','SIZE' => '10px','label'=>'Status','align'=>'left']],
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
						['value'=>url::to(['/master/payroll-salary/view','id'=>$model->KAR_ID]),
						'id'=>'modalButtonSalary',
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
		}else{
			$gvfilterType=false;
			$gvfilter=true;
			$filterWidgetOpt=false;		
			//$filterInputOpt=false;
			$filterOptCspn=1;
			//$filterColor=false;
			$filterColor='rgba(97, 211, 96,1)';
		};
		
		
		
		$attDinamik[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'filter'=>$gvfilter,
			'filterType'=>$gvfilterType,
			'filterWidgetOptions'=>$filterWidgetOpt,
			'filterOptions'=>[
				'colspan'=>$filterOptCspn,
				'style'=>['background-color'=>$filterColor],
			],			
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
	
	$salary= GridView::widget([
		'id'=>'salary-id',
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			''//'{export}',
		],	
		'panel'=>[
			//'heading'=>'<h3 class="panel-title">LIST EMPLOYEE SALARY</h3>',
			'heading'=>false,
			'type'=>'warning',
			'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Add Salary',
									['modelClass' => 'Kategori',]),'/master/payroll-salary/create',[
										'data-toggle'=>"modal",
										'data-target'=>"#modal-create-salary",
										'class' => 'btn btn-success btn-sm'
									]
						).' '.
						Html::a('<i class="fa fa-history "></i> '.Yii::t('app', 'Refresh'),
									'/master/payroll-salary/',
									[
									  // 'id'=>'refresh-cust',
									   'class' => 'btn btn-info btn-sm',
									   //'data-pjax'=>false,
									]
						).' '.
						Html::a('<i class="fa fa-file-excel-o"></i> '.Yii::t('app', 'Export'),
									'/export/salary',
									[
										//'id'=>'export-data',
										//'data-pjax' => true,
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
				'id'=>'salary-id',
			],
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true,
	]);
?>
	<?=$salary?>


