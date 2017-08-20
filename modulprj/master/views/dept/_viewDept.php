<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;

	$attDept = [
		[
			'group'=>true,
			//'label'=>'EMPLOYEE IDENTIFICATION',
			'label'=>false,
			'rowOptions'=>['class'=>'info'],
			'groupOptions'=>['class'=>'text-left'] //text-center 
		],
		[
			'attribute' =>	'DEP_ID',
			'label'=>'Department.Id',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
			'options'=>[
				'readonly'=>true
			]
		],
		[
			'attribute' =>	'DEP_NM',
			'label'=>'Department Name',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
	];
	
	/*Detail View Department Editing*/
	$dtDepartment=DetailView::widget([
		'id'=>'dept-id',
		'model' => $model,
		'attributes'=>$attDept,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>EDITING DEPARTMENT</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtnDept',
			'value'=>'/master/dept/view-dept?id='.$model->DEP_ID,
			'params' => ['custom_param' => true],
		],		
	]);
?>
	<?=$dtDepartment?>