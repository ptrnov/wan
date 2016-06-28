<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinDetail */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Ijin Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

	/*Employee Info*/
	$dvEmpInfo=DetailView::widget([
		'model' => $model,
		'attributes' => [
			[
				'attribute' =>	'ID',
				'label'=>'Ijin.ID :',
				'labelColOptions' => ['style' => 'text-align:right;width: 30%']
			],
			[
				'attribute' =>	'KAR_ID',
				'label'=>'Employee.ID :',
				'labelColOptions' => ['style' => 'text-align:right;width: 30%']
			],
			[
				'attribute' =>	'empNm',
				'label'=>'Employee Name :',
				'labelColOptions' => ['style' => 'text-align:right;width: 30%']
			],
			[
				'attribute' =>	'cabNm',
				'label'=>'Cabang :',
				'labelColOptions' => ['style' => 'text-align:right;width: 30%']
			],
			[
				'attribute' =>	'depNm',
				'label'=>'Department :',
				'labelColOptions' => ['style' => 'text-align:right;width: 30%']
			],
			
		],
	]);
	
	// 'KAR_ID',
			// 'IJN_SDATE',
			// 'IJN_EDATE',
			// 'IJN_ID',
			// 'IJN_NOTE:ntext',
			
	/*Attribute EXCEPTION Editing View */
	$attException = [
		[
			'group'=>true,
			'label'=>false,
			'rowOptions'=>['class'=>'info'],
			'groupOptions'=>['class'=>'text-left'] //text-center 
		],
		[ 	//IJN_ID
			'attribute' =>'IJN_ID',
			'format'=>'raw',
			'value'=>$model->ijinNm,
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$aryIjinHeader,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
		],
		[	// IJN_SDATE
			'attribute' =>	'IJN_SDATE',
			'type'=>DetailView::INPUT_DATETIME,
			'widgetOptions'=>[
				'pluginOptions'=>[
					'format'=>'yyyy-mm-dd H:i:s',
					'autoclose' => true,
                    'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
		[	// IJN_EDATE
			'attribute' =>	'IJN_EDATE',
			'type'=>DetailView::INPUT_DATETIME,
			'widgetOptions'=>[
				'pluginOptions'=>[
					'format'=>'yyyy-mm-dd H:i:s',
					'autoclose' => true,
                    'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
	];
	
	/*Detail EXCEPTION View Editing*/
	$dtIjin=DetailView::widget([
		'id'=>'ijin-id',
		'model' => $model,
		'attributes'=>$attException,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>EXCEPTION APPROVED</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtn',
			'value'=>'/master/ijin-detail/view?id='.$model->ID,
			'params' => ['custom_param' => true],
		],		
	]);
	
	/*Attribute Note*/
	$attNote = [
		[
			'group'=>true,
			//'label'=>'EMPLOYEE IDENTIFICATION',
			'label'=>false,
			'rowOptions'=>['class'=>'info'],
			'groupOptions'=>['class'=>'text-left'] //text-center 
		],
		[
			'attribute' =>	'IJN_NOTE',
			'label'=>'Note',
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 15px']
		],
	];
	
	/*Detail View Note Editing*/
	$dtNote=DetailView::widget([
		'id'=>'note-id',
		'model' => $model,
		'attributes'=>$attNote ,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>EXCEPTION NOTE</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtn',
			'value'=>'/master/ijin-detail/view?id='.$model->ID,
			'params' => ['custom_param' => true],
		],		
	]);
	
	
	
	
?>
<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="row" >
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<?=$dvEmpInfo?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<?=$dtIjin?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?=$dtNote?>
		</div>
	</div>
</div>
