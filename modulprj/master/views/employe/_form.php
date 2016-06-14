<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

?>

<div class="barang-form">

    <?php $form = ActiveForm::begin([
			'type' => ActiveForm::TYPE_HORIZONTAL,
			'method' => 'post',
			'id'=>'form-employe-id',
           //'enableClientValidation' => true,
			'options' => ['enctype' => 'multipart/form-data']
		]);
	?>
		<?php // $form->field($model, 'cabID')->hiddenInput(['value'=>1,'maxlength' => true])->label(false) ?>
		<?php
			//CABANG -> Source Generate code  Compponen
			echo $form->field($model, 'CAB_ID')->dropDownList($aryCbgID,[
				'id'=>'emp-cab',
				'prompt'=>' -- Pilih Salah Satu --',
			]);//->label('Cabang');
			
			echo $form->field($model, 'KAR_NM')->textInput(['maxlength' => true]);//->label('Name');
			
			//INPUT FILE IMAGE
			echo $form->field($model, 'image')->widget(FileInput::classname(), [
					'options'=>['accept'=>'image/*'],
					'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']]
				]);
		?>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?= Html::submitButton($model->isNewRecord ? '&nbsp;&nbsp;Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
		</div>

    <?php ActiveForm::end(); ?>

</div>
