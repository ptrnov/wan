<?php

use yii\helpers\Html;
//use kartik\form\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollSalary */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin([
			'id'=>'salary-employe',
			'enableClientValidation' => true,
			'enableAjaxValidation' => true,
			'method' => 'post',
			'action' => ['/master/payroll-salary/create'],
	]); 
?>
	<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
		<div class="row" >
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<?=$form->field($model, 'cAB_ID')->dropDownList($aryCbg,[
						'id'=>'payrollsalary-cab_id',
						'prompt'=>' -- Pilih Cabang --',
					])->label('Branch');
				?>	
				<?=$form->field($model, 'dEP_ID')->dropDownList($aryDep,[
						'id'=>'payrollsalary-dep_id',
						'prompt'=>' -- Pilih Department --',
					])->label('Department');
				?>	
				<?=$form->field($model, 'KAR_ID')->widget(DepDrop::classname(), [
						'type'=>DepDrop::TYPE_SELECT2,
						'data' => $aryKaryawan,
						'options' => ['id'=>'payrollsalary-kar_id'],
						'pluginOptions' => [
							'depends'=>['payrollsalary-cab_id','payrollsalary-dep_id'],
							'url'=>Url::to(['/master/ijin-detail/cabang-employe']),
							'initialize'=>true,
						],
					])->label('Employee');
				?>
				<?php //= $form->field($model, 'KAR_ID')->textInput(['maxlength' => true]) ?>
				
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<?= $form->field($model, 'PAY_DAY')->textInput() ?>

				<?= $form->field($model, 'PAY_MONTH')->textInput() ?>

				<?= $form->field($model, 'PAY_TUNJANGAN')->textInput() ?>
			
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				
				<?= $form->field($model, 'PAY_TRANPORT')->textInput() ?>

				<?= $form->field($model, 'PAY_EAT')->textInput() ?>

				<?= $form->field($model, 'BONUS')->textInput() ?>

				<?= $form->field($model, 'PAY_ENTERTAIN')->textInput() ?>			
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<?= $form->field($model, 'STATUS_ACTIVE')->textInput() ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<?= $form->field($model, 'NOTE')->textarea(['rows' => 6]) ?>
			
				<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
		</div>
	</div>
 <?php ActiveForm::end(); ?>
