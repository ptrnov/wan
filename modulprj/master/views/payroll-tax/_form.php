<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollTax */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-tax-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KAR_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sDate')->textInput() ?>

    <?= $form->field($model, 'eDate')->textInput() ?>

    <?= $form->field($model, 'TTL_UPAH')->textInput() ?>

    <?= $form->field($model, 'PTKP_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PTKP_VALUE')->textInput() ?>

    <?= $form->field($model, 'UPAH_PTKP')->textInput() ?>

    <?= $form->field($model, 'TTL_PTKP')->textInput() ?>

    <?= $form->field($model, 'PPH21')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
