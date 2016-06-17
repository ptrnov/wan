<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollAsuransiFormula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-asuransi-formula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ASR_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ASR_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ASR_PAY_MONTH')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
