<?php
use kartik\helpers\Html;
//use yii\helpers\Html;
use yii\helpers\ArrayHelper;
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

 	$attsalary = [
		[
			'attribute' =>	'KAR_ID',
			'options'=>['readonly'=>true,],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'PAY_DAY',
			'label'=>'UPAH HARIAN',
			'options'=>['readonly'=>false,],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'PAY_MONTH',
			'label'=>'UPAH BULANAN',
			'options'=>['readonly'=>true,],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'PAY_TUNJANGAN',
			'label'=>'TUNJANGAN',
			'options'=>['readonly'=>true,],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'PAY_TRANPORT',
			'label'=>'TRANPORT',
			'options'=>['readonly'=>true,],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'PAY_EAT',
			'label'=>'TUNJANGAN MAKAN',
			'options'=>['readonly'=>true,],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'PAY_ENTERTAIN',
			'label'=>'ENTERTAIN',
			'options'=>['readonly'=>true,],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'BONUS',
			'label'=>'BONUS',
			'options'=>['readonly'=>true,],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		
	];
	$dtSalary=DetailView::widget([
		'id'=>'salary-edit-id',
		'model' => $model,
		'attributes'=>$attsalary,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-money"></div><div><h6 class="modal-title"><b>UPDATE SALARY</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtn',
			'value'=>'/master/payroll-salary/editing?id='.$model->ID,
			'params' => ['custom_param' => true],
		],		
	]);
?>
<?=$dtSalary?>	
