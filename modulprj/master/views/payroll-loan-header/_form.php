<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollLoanHeader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-loan-header-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KAR_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TGL')->textInput() ?>

    <?= $form->field($model, 'PNJ_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PNJ_PAY_REGULASI')->textInput() ?>

    <?= $form->field($model, 'PNJ_PAY_MONTH')->textInput() ?>

    <?= $form->field($model, 'PNJ_PAY')->textInput() ?>

    <?= $form->field($model, 'STT')->textInput() ?>

    <?= $form->field($model, 'KET')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
