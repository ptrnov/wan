<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\absensi\models\AbsenImport */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absen-import-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TERMINAL_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FINGER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MESIN_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KAR_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KAR_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DEP_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DEP_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HARI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IN_TGL')->textInput() ?>

    <?= $form->field($model, 'IN_WAKTU')->textInput() ?>

    <?= $form->field($model, 'OUT_TGL')->textInput() ?>

    <?= $form->field($model, 'OUT_WAKTU')->textInput() ?>

    <?= $form->field($model, 'GRP_ID')->textInput() ?>

    <?= $form->field($model, 'PAY_DAY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VAL_PAGI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VAL_LEMBUR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAY_PAGI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAY_LEMBUR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CREATE_AT')->textInput() ?>

    <?= $form->field($model, 'UPDATE_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATE_AT')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'DCRP_DETIL')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
