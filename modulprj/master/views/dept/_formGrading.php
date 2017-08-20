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
	<div class="row">
		<?php $form = ActiveForm::begin([
				'type' => ActiveForm::TYPE_HORIZONTAL,
				'method' => 'post',
				//'action' => ['/master/dept','id'=>$model->EMP_ID],
				'id'=>'form-employe',
				'enableClientValidation' => true,
				'options' => ['enctype' => 'multipart/form-data']
			]);
		?>
		<?php // $form->field($model, 'cabID')->hiddenInput(['value'=>1,'maxlength' => true])->label(false) ?>

		<div class="col-lg-12 pull-right">	
			
			<?= $form->field($modalGrdg, 'GF_ID')->widget(Select2::classname(), [
			'data' => $aryGfId,
			'options' => ['placeholder' => 'Pilih KD UNIT ...'],
			'pluginOptions' => [
				'allowClear' => true
				 ],
			])->label('Group Function');?>
			
			<?= $form->field($modalGrdg, 'JOBGRADE_NM')->textInput(['maxlength' => true]) ?>
		</div>
		<div  class="col-lg-12" style="text-align: right;">
			<?php echo Html::submitButton('Update',['class' => 'btn btn-primary']); ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>	
</div>
