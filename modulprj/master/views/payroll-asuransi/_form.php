<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollAsuransi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-asuransi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sDate')->textInput() ?>

    <?= $form->field($model, 'eDate')->textInput() ?>

    <?= $form->field($model, 'ASR_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ASR_PAY_MONTH')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
