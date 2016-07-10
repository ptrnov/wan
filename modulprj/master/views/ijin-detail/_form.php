<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use kartik\widgets\datetimepicker;
use kartik\widgets\TimePicker;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ijin-detail-form">

    <?php $form = ActiveForm::begin(); ?>

	<?=$form->field($model, 'CAB_ID')->dropDownList($aryCbg,[
			'id'=>'ijindetail-cab_id',
			'prompt'=>' -- Pilih Cabang --',
		])->label('Branch');
	?>	
	<?=$form->field($model, 'DEP_ID')->dropDownList($aryDep,[
			'id'=>'ijindetail-dep_id',
			'prompt'=>' -- Pilih Department --',
		])->label('Department');
	?>	
	<?=$form->field($model, 'KAR_ID')->widget(DepDrop::classname(), [
			'type'=>DepDrop::TYPE_SELECT2,
			'data' => $aryKaryawan,
			'options' => ['id'=>'select2-ijindetail-kar_id-container'],
			'pluginOptions' => [
				'depends'=>['ijindetail-cab_id','ijindetail-dep_id'],
				'url'=>Url::to(['/master/ijin-detail/cabang-employe']),
				'initialize'=>true,
			],
		])->label('Employee');
	?>
	<?=$form->field($model, 'IJN_ID')->widget(Select2::classname(), [
			'data' => $aryIjinHeader,
			'options' => ['placeholder' => 'Pilih  Nama Ijin ...'],
			'pluginOptions' => [
				'allowClear' => true
			 ],
		])->label('Exception Name');
	?>
	<?=$form->field($model, 'IJN_SDATE')->widget(datetimepicker::classname(), [
			'options' => ['placeholder' => ' Jam dan waktu Mulai  ...'],
			'pluginOptions' => [
			   'autoclose'=>true,
			   'format' => 'yyyy-mm-dd HH:ii:ss',
			],
			'pluginEvents'=>[
					   'show' => "function(e) {errror}",
			],
		])   
	?>	
	<?=$form->field($model, 'IJN_EDATE')->widget(datetimepicker::classname(), [
			'options' => ['placeholder' => ' Jam dan waktu akhir  ...'],
			'pluginOptions' => [
			   'autoclose'=>true,
			   'format' => 'yyyy-mm-dd HH:ii:ss',
			],
			'pluginEvents'=>[
					   'show' => "function(e) {errror}",
			],
		])   
	?>	
	<?php //= $form->field($model, 'IJN_ID')->textInput() ?>
    <?php //= $form->field($model, 'KAR_ID')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'IJN_SDATE')->textInput() ?>

    <?php //= $form->field($model, 'IJN_EDATE')->textInput() ?>

    

    <?= $form->field($model, 'IJN_NOTE')->textarea(['rows' => 6])->label('Discription') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
