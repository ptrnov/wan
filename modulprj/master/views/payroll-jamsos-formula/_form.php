<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollJamsosFormula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-jamsos-formula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SOS_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA_UPAH')->textInput() ?>

    <?= $form->field($model, 'JML_SOS')->textInput() ?>

    <?= $form->field($model, 'JKK')->textInput() ?>

    <?= $form->field($model, 'JKM')->textInput() ?>

    <?= $form->field($model, 'JPK')->textInput() ?>

    <?= $form->field($model, 'JHT_TK')->textInput() ?>

    <?= $form->field($model, 'JHT')->textInput() ?>

    <?= $form->field($model, 'SOS_TTL')->textInput() ?>

    <?= $form->field($model, 'PERSEN_JKK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PERSEN_JKM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PERSEN_JPK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PERSEN_JHT_TK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PERSEN_JHT')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
