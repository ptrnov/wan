<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;

	$attGrading = [
		[
			'group'=>true,
			//'label'=>'EMPLOYEE IDENTIFICATION',
			'label'=>false,
			'rowOptions'=>['class'=>'info'],
			'groupOptions'=>['class'=>'text-left'] //text-center 
		],
		[
			'attribute' =>	'JOBGRADE_ID',
			'label'=>'Grading.Id',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%'],
			'options'=>[
				'readonly'=>true
			]
		],
		[
			'attribute' =>	'JOBGRADE_NM',
			'label'=>'Grading Name',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
	];
	
	/*Detail View Department Editing*/
	$dtGrading=DetailView::widget([
		'id'=>'grading-id',
		'model' => $model,
		'attributes'=>$attGrading,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>EDITING GRADING</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtnGrading',
			'value'=>'/master/dept/view-grading?id='.$model->ID,
			'params' => ['custom_param' => true],
		],		
	]);
?>
	<?=$dtGrading?>