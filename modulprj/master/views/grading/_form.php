<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\Grading */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grading-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'GF_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JOBGRADE_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JOBGRADE_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JOBGRADE_DCRP')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'JOBGRADE_STS')->textInput() ?>

    <?= $form->field($model, 'CREATED_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATED_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATED_TIME')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
