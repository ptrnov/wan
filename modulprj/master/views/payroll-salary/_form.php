<?php

use yii\helpers\Html;
//use kartik\form\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\money\MaskMoney;

	$arrayStt= [
		  ['status' => 0, 'DESCRIP' => 'Disable'],
		  ['status' => 1, 'DESCRIP' => 'Enable'],
	];
	$valStt = ArrayHelper::map($arrayStt, 'status', 'DESCRIP');
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
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
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
				<?php //= $form->field($model, 'STATUS_ACTIVE')->textInput() ?>
				<?=$form->field($model, 'STATUS_ACTIVE')->dropDownList($valStt,[
						//'id'=>'payrollsalary-cab_id',
						//'prompt'=>' -- Pilih Cabang --',
					])->label('Status');
				?>	
				<?= $form->field($model, 'NOTE')->textarea(['rows' =>8]) ?>
				
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?= $form->field($model, 'PAY_DAY')->widget(MaskMoney::classname(), [
						'pluginOptions' => [
							'prefix' => 'Rp.',
							'allowNegative' => false
						]
					]);
				?>
				<?= $form->field($model, 'PAY_MONTH')->widget(MaskMoney::classname(), [
						'pluginOptions' => [
							'prefix' => 'Rp.',
							'allowNegative' => false
						]
					]);
				?>
				<?= $form->field($model, 'PAY_TUNJANGAN')->widget(MaskMoney::classname(), [
						'pluginOptions' => [
							'prefix' => 'Rp.',
							'allowNegative' => false
						]
					]);
				?>
				<?= $form->field($model, 'PAY_EAT')->widget(MaskMoney::classname(), [
						'pluginOptions' => [
							'prefix' => 'Rp.',
							'allowNegative' => false
						]
					]);
				?>
			<?= $form->field($model, 'PAY_TRANPORT')->widget(MaskMoney::classname(), [
						'pluginOptions' => [
							'prefix' => 'Rp.',
							'allowNegative' => false
						]
					]);
				?>
				
				<?= $form->field($model, 'BONUS')->widget(MaskMoney::classname(), [
						'pluginOptions' => [
							'prefix' => 'Rp.',
							'allowNegative' => false
						]
					]);
				?>
				<?= $form->field($model, 'PAY_ENTERTAIN')->widget(MaskMoney::classname(), [
						'pluginOptions' => [
							'prefix' => 'Rp.',
							'allowNegative' => false
						]
					]);
				?>	
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<?php echo Html::submitButton('Save',['class' => 'btn btn-primary']); ?>
			</div>
		</div>
	</div>
 <?php ActiveForm::end(); ?>
