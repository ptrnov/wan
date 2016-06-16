<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

use modulprj\master\models\Karyawan;

$aryKaryawane = ArrayHelper::map(Karyawan::find()->all(),'EMP_ID','EMP_NM');

/* @var $this yii\web\View */
/* @var $model lukisongroup\hrd\models\Kar_finger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kar-finger-form">

    <?php $form = ActiveForm::begin([
                'id'=>'finger-employe',
                'enableClientValidation' => true,
				'method' => 'post',
				'action' => ['/hrd/absen-maintain/finger-emp-save'],
		]); 
	?>

    <?= $form->field($model, 'TerminalID')->hiddenInput(['value'=>$modelView->TerminalID,'maxlength' => true])->label(false); ?>
	  
	<?= $form->field($model, 'mesinNm')->textInput(['value'=>$modelView->Machine_nm,'maxlength' => true,'readonly'=>true])->label('Machine ID'); ?>
	<?= $form->field($model, 'FingerPrintID')->textInput(['value'=>$modelView->FingerPrintID,'maxlength' => true,'readonly'=>true])->label('Finger'); ?>
    <?= $form->field($model, 'KAR_ID')->widget(Select2::classname(), [
			'data' => $aryKaryawane,
			'options' => ['placeholder' => 'Pilih Karyawane ...'],
			'pluginOptions' => [
				'allowClear' => true
				 ],
		]);
	?>
    

    <?php // $form->field($model, 'FingerTmpl')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'UPDT')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
