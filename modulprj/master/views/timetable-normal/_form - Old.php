<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableNormal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-normal-form">
	<?php $form = ActiveForm::begin([
			//'type' => ActiveForm::TYPE_HORIZONTAL,
			'method' => 'post',
			'id'=>'form-timetable-normal-id',
           //'enableClientValidation' => true,
			'options' => ['enctype' => 'multipart/form-data']
		]);
	?>
	<div class="row">
		<div class="col-lg-6">
			<?php //= $form->field($model, 'TT_GRP_ID')->textInput() ?>
			<?=$form->field($model, 'TT_GRP_ID')->dropDownList($aryTtGrp,[
					'id'=>'tt-group',
					'prompt'=>' -- Pilih Salah Satu --',
				]);
			?>			
			<?=$form->field($model, 'TT_SDAYS')->dropDownList($arrayDayOfWeek,[
					'id'=>'tt-ktg',
					'prompt'=>' -- Dari hari --',
				]);
			?>	
			<?=$form->field($model, 'TT_SDATE')->widget(DatePicker::classname(), [
					'options' => ['placeholder' => 'Dari Tanggal  ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   'format' => 'dd-mm-yyyy',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>			
			
		
			

			<?= $form->field($model, 'TT_UPDT')->textInput() ?>

			

			<?= $form->field($model, 'RULE_IN')->textInput() ?>

			<?= $form->field($model, 'RULE_OUT')->textInput() ?>

			<?= $form->field($model, 'RULE_TOL_IN')->textInput() ?>

			<?= $form->field($model, 'RULE_TOL_OUT')->textInput() ?>

			<?= $form->field($model, 'RULE_BRK_OUT')->textInput() ?>

			<?= $form->field($model, 'RULE_BRK_IN')->textInput() ?>

			<?= $form->field($model, 'RULE_DRT_OT_DPN')->textInput() ?>

			<?= $form->field($model, 'RULE_DRT_OT_BLK')->textInput() ?>

			<?= $form->field($model, 'RULE_DURATION')->textInput() ?>

			<?= $form->field($model, 'RULE_FRK_DAY')->textInput() ?>

			<?= $form->field($model, 'LEV1_FOT_HALF')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'LEV1_FOT_HOUR')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'LEV1_FOT_MAX')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'LEV1_FOT_MAX_TIME')->textInput() ?>

			<?= $form->field($model, 'LEV2_FOT_HALF')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'LEV2_FOT_HOUR')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'LEV2_FOT_MAX')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'LEV2_FOT_MAX_TIME')->textInput() ?>

			<?= $form->field($model, 'LEV3_FOT_HALF')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'LEV3_FOT_HOUR')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'LEV3_FOT_MAX')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'LEV3_FOT_MAX_TIME')->textInput() ?>

			<?= $form->field($model, 'KOMPENSASI')->textInput() ?>
		</div>
		<div class="col-lg-6">
			<?=$form->field($model, 'TT_TYP_KTG')->dropDownList($aryTtKtg,[
					'id'=>'tt-ktg',
					'prompt'=>' -- Pilih Name --',
				]);
			?>
			<?=$form->field($model, 'TT_EDAYS')->dropDownList($arrayDayOfWeek,[
					'id'=>'tt-ktg',
					'prompt'=>' -- Sampai hari --',
				]);
			?>
		
			<?=$form->field($model, 'TT_EDATE')->widget(DatePicker::classname(), [
					'options' => ['placeholder' => 'Sampai Tanggal ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   'format' => 'dd-mm-yyyy',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>
		</div><div class="col-lg-12">		
			<?= $form->field($model, 'TT_NOTE')->textInput(['maxlength' => true]) ?>
		</div>
	</div>
		<div class="form-group">
			<?= $form->field($model, 'TT_ACTIVE')->textInput() ?>
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

    <?php ActiveForm::end(); ?>

</div>
