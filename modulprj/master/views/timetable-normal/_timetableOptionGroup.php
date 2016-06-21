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

	// 'TT_ID',,'TT_GRP_ID','TT_TYP','TT_TYP_KTG','TT_SDAYS','TT_EDAYS','TT_SDATE','TT_EDATE','TT_NOTE','TT_UPDT','TT_ACTIVE','RULE_IN','RULE_OUT','RULE_TOL_IN',
    // 'RULE_TOL_OUT','RULE_BRK_OUT','RULE_BRK_IN','RULE_DRT_OT_DPN','RULE_DRT_OT_BLK','RULE_DURATION','RULE_FRK_DAY','LEV1_FOT_HALF','LEV1_FOT_HOUR', 'LEV1_FOT_MAX',
    // 'LEV1_FOT_MAX_TIME','LEV2_FOT_HALF','LEV2_FOT_HOUR','LEV2_FOT_MAX','LEV2_FOT_MAX_TIME','LEV3_FOT_HALF','LEV3_FOT_HOUR','LEV3_FOT_MAX','LEV3_FOT_MAX_TIME','KOMPENSASI',
 
	$aryField= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'TT_GRP_ID','SIZE' => '20px','label'=>'Group ID','align'=>'left']],
		['ID' =>1, 'ATTR' =>['FIELD'=>'TT_GRP_NM','SIZE' => '10px','label'=>'Name','align'=>'left']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'TT_GRP_STT','SIZE' => '20px','label'=>'Status Day','align'=>'left']],
	];	
	$valFields = ArrayHelper::map($aryField, 'ID', 'ATTR'); 
	
	/*
	 * GRIDVIEW COLUMN
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	*/	
	$attDinamik =[];
		
	/*OTHER ATTRIBUTE*/
	foreach($valFields as $key =>$value[]){
		$attDinamik[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
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
	
	$ttOptGroup= GridView::widget([
		'id'=>'timetable-option-group',
		'dataProvider' => $dataProviderGrp,
		'filterModel' => $searchModelGrp,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			''//'{export}',
		],	
		'panel'=>[
			'heading'=>'<h3 class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:9pt;text-align:left;"><b>ABSENSI CATEGORY</b></h3>',
			//'heading'=>false,
			'type'=>'warning',
			'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Add',
									['modelClass' => 'Kategori',]),'/master/employe/create',[
										'data-toggle'=>"modal",
										'data-target'=>"#modal-create",
										'class' => 'btn btn-success btn-sm'
									]
						).' '.
						Html::a('<i class="fa fa-history "></i> '.Yii::t('app', 'Refresh'),
									'/master/employe/',
									[
									   'class' => 'btn btn-info btn-sm',
									]
						),
						'footer'=>false,
		],
		'summary'=>false,
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'timetable-option-group',
			],
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true
	]);
?>
	<?=$ttOptGroup?>







