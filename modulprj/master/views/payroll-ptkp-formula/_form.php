<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollPtkpFormula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-ptkp-formula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NO')->textInput() ?>

    <?= $form->field($model, 'PTKP_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STT_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ANAK')->textInput() ?>

    <?= $form->field($model, 'PTKP_VALUE')->textInput() ?>

    <?= $form->field($model, 'PPH21')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
