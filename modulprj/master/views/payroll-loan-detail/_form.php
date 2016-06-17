<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollLoanDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-loan-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TGL')->textInput() ?>

    <?= $form->field($model, 'PNJ_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PNJ_PAY')->textInput() ?>

    <?= $form->field($model, 'PNJ_FLT')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
