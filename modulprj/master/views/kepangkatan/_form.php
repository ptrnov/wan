<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\Kepangkatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kepangkatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'GF_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GF_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GF_DCRP')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'STATUS')->textInput() ?>

    <?= $form->field($model, 'CREATED_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATED_BY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UPDATED_TIME')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
