<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollSalary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-salary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KAR_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAY_DAY')->textInput() ?>

    <?= $form->field($model, 'PAY_MONTH')->textInput() ?>

    <?= $form->field($model, 'PAY_TUNJANGAN')->textInput() ?>

    <?= $form->field($model, 'PAY_TRANPORT')->textInput() ?>

    <?= $form->field($model, 'PAY_EAT')->textInput() ?>

    <?= $form->field($model, 'BONUS')->textInput() ?>

    <?= $form->field($model, 'PAY_ENTERTAIN')->textInput() ?>

    <?= $form->field($model, 'STATUS_ACTIVE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
