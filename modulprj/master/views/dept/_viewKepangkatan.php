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
			'attribute' =>	'GF_ID',
			'label'=>'Group Function Id',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%'],
			'options'=>[
				'readonly'=>true
			]
		],
		[
			'attribute' =>	'GF_NM',
			'label'=>'Group Function Name',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
	];
	
	/*Detail View Department Editing*/
	$dtDepartment=DetailView::widget([
		'id'=>'kepangkatan-id',
		'model' => $model,
		'attributes'=>$attDept,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>EDITING KEPANGKATAN</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtnKepangkatan',
			'value'=>'/master/dept/view-kepangkatan?id='.$model->ID,
			'params' => ['custom_param' => true],
		],		
	]);
?>
	<?=$dtDepartment?>