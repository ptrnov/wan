<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ijin-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KAR_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IJN_SDATE')->textInput() ?>

    <?= $form->field($model, 'IJN_EDATE')->textInput() ?>

    <?= $form->field($model, 'IJN_ID')->textInput() ?>

    <?= $form->field($model, 'IJN_NOTE')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
