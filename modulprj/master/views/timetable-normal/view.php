<?php
use kartik\helpers\Html;
//use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use modulprj\master\models\Cbg;
use modulprj\master\models\Dept;
use modulprj\master\models\Jabatan;
use modulprj\master\models\Status;
use yii\web\UploadedFile;
use yii\helpers\Url;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\icons\Icon;
use kartik\widgets\Growl;
use kartik\widgets\FileInput;
use kartik\builder\FormGrid;
use kartik\markdown\Markdown;
use kartik\widgets\DepDrop;

// $this->title = $model->TT_ID;
// $this->params['breadcrumbs'][] = ['label' => 'Timetable Normals', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;

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
// 'RULE_TOL_IN',
// 'RULE_TOL_OUT',
// 'RULE_BRK_OUT',
// 'RULE_BRK_IN',
// 'RULE_DRT_OT_DPN',
// 'RULE_DRT_OT_BLK',
// 'RULE_DURATION',
// 'RULE_FRK_DAY',
// 'LEV1_FOT_HALF',
// 'LEV1_FOT_HOUR',
// 'LEV1_FOT_MAX',
// 'LEV1_FOT_MAX_TIME',
// 'LEV2_FOT_HALF',
// 'LEV2_FOT_HOUR',
// 'LEV2_FOT_MAX',
// 'LEV2_FOT_MAX_TIME',
// 'LEV3_FOT_HALF',
// 'LEV3_FOT_HOUR',
// 'LEV3_FOT_MAX',
// 'LEV3_FOT_MAX_TIME',
// 'KOMPENSASI',
	$attbTtHeader=[
		[	//Day Kategory Attendance
			'attribute' =>	'grpNm',
			'label'=>'Category :',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[	//Day Type Attendance
			'attribute' =>	'ktgNm',
			'label'=>'Type :',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[ 	//Day Start
			'attribute' =>'TT_SDAYS',
			'format'=>'raw',
			'value'=>$model->vTT_SDAYS,
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$arrayDayOfWeek,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
		],
		[ 	//Day Until
			'attribute' =>'TT_EDAYS',
			'format'=>'raw',
			'value'=>$model->vTT_EDAYS,
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$arrayDayOfWeek,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
		],
		[	// Range Date Start 
			'attribute' =>	'TT_SDATE',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>[
					'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
		[	// Range Until Date End 
			'attribute' =>	'TT_EDATE',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>[
					'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
		[ 	//Status
			'attribute' =>'TT_ACTIVE',
			'format'=>'raw',
			'value'=>$model->vTT_STATUS,
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$aryStt,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
		],
		[	//Note
			'attribute' =>	'TT_NOTE',
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
	];
	
	$attbTtDetail=[
		[	// Time In
			'attribute' =>	'RULE_IN',
			'format'=>'time',
			'type'=>DetailView::INPUT_TIME,
			'widgetOptions'=>[
				'pluginOptions'=>[
					//'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				],
				'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
			],
			'inputWidth'=>'100%',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[	// Time OUT
			'attribute' =>	'RULE_OUT',
			'format'=>'time',
			'type'=>DetailView::INPUT_TIME,
			'widgetOptions'=>[
				'pluginOptions'=>[
					//'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
		[	// Time LATE
			'attribute' =>	'RULE_TOL_IN',
			'format'=>'time',
			'type'=>DetailView::INPUT_TIME,
			'widgetOptions'=>[
				'pluginOptions'=>[
					//'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
		[	// Time EARLY
			'attribute' =>	'RULE_TOL_OUT',
			'format'=>'time',
			'type'=>DetailView::INPUT_TIME,
			'widgetOptions'=>[
				'pluginOptions'=>[
					//'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
		[	// Time BREAK OUT
			'attribute' =>	'RULE_BRK_OUT',
			'format'=>'time',
			'type'=>DetailView::INPUT_TIME,
			'widgetOptions'=>[
				'pluginOptions'=>[
					//'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
		[	// Time BREAK IN
			'attribute' =>	'RULE_BRK_IN',
			'format'=>'time',
			'type'=>DetailView::INPUT_TIME,
			'widgetOptions'=>[
				'pluginOptions'=>[
					//'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
	];
	
	$dtTimetableHeader=DetailView::widget([
		'id'=>'tt-header',
		'model' => $model,
		'attributes'=>$attbTtHeader,	
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>TIMETABLE HEADER</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtn',
			'value'=>'/master/employe/view?id='.$model->TT_ID,
			'params' => ['custom_param' => true],
		],	
	]);
	
	$dtTimetableDetail=DetailView::widget([
		'id'=>'tt-detail',
		'model' => $model,
		'attributes'=>$attbTtDetail,	
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
			'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>TIMETABLE DETAIL</b></h6></div>',
			'type'=>DetailView::TYPE_INFO,
		],
		'saveOptions'=>[ 
			'id' =>'saveBtn',
			'value'=>'/master/employe/view?id='.$model->TT_ID,
			'params' => ['custom_param' => true],
		],	
		
	]);

?>
<div class="timetable-normal-view">
	<div class="row" >
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">				
			<?=$dtTimetableHeader?>	
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<?=$dtTimetableDetail;?>			
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-12">
			<?php 
				$gvOt=$this->render('_viewGridOvertime',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
				]);
			?>
			<?=$gvOt;?>			
		</div>
	</div>
</div>
