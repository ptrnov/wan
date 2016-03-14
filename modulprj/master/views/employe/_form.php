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
            'enableClientValidation' => true,
			'options' => ['enctype' => 'multipart/form-data']
		]);
	?>
		<?php // $form->field($model, 'cabID')->hiddenInput(['value'=>1,'maxlength' => true])->label(false) ?>
		<?php

			echo $form->field($model, 'CAB_ID')->dropDownList($aryCbgID,[
				'id'=>'emp-cab',
				'prompt'=>' -- Pilih Salah Satu --',
			])->label('Cabang');
			
			/*
			echo $form->field($model, 'KD_TYPE')->widget(DepDrop::classname(), [
				'type'=>DepDrop::TYPE_SELECT2,
				'data' => $droptype,
				'options' => ['id'=>'barang-kd_type'],
				'pluginOptions' => [
					'depends'=>['barang-kd_corp'],
					'url'=>Url::to(['/master/barang/prodak-corp-type']), 
					'initialize'=>true,
				],
			]);

			echo $form->field($model, 'KD_KATEGORI')->widget(DepDrop::classname(), [
				'type'=>DepDrop::TYPE_SELECT2,
				'data' => $dropkat,
				'options' => ['id'=>'barang-kd_kategori'],
				'pluginOptions' => [
					'depends'=>['barang-kd_corp','barang-kd_type'],
					'url'=>Url::to(['/master/barang/prodak-type-kat']),
					'initialize'=>true,
				],
			]); */
		?>
		<?= $form->field($model, 'KAR_NM')->textInput(['maxlength' => true]) ?>
		<?php /* $form->field($model, 'KD_UNIT')->widget(Select2::classname(), [
			'data' => $dropunit,
			'options' => ['placeholder' => 'Pilih KD UNIT ...'],
			'pluginOptions' => [
				'allowClear' => true
				 ],
		]); */
		?>

		<?php
			/* $form->field($model, 'KD_SUPPLIER')->widget(Select2::classname(), [
			'data' => $dropsup,
			'options' => ['placeholder' => 'Pilih  Nama Supplier ...'],
			'pluginOptions' => [
				'allowClear' => true
				 ],
			]); */
		?>


		<?php /* $form->field($model, 'KD_DISTRIBUTOR')->widget(Select2::classname(), [
			'data' => $dropdistrubutor,
			'options' => ['placeholder' => 'Pilih KD DISTRIBUTOR  ...'],
			'pluginOptions' => [
				'allowClear' => true
				 ],
		]); */ ?>
		<?php //$form->field($model, 'NOTE')->textarea(['rows' => 6]) ?>
		<?php //$form->field($model, 'STATUS')->dropDownList(['' => ' -- Silahkan Pilih --', '0' => 'Tidak Aktif', '1' => 'Aktif']) ?>
		<?php 
			/* echo $form->field($model, 'image')->widget(FileInput::classname(), [
			'options'=>['accept'=>'image/*'],
			'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']]
			]); */
		?>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Barang' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			</div>
		</div>

    <?php ActiveForm::end(); ?>

</div>
