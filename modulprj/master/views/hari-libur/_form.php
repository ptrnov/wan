<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\HariLibur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hari-libur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TAHUN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LBR_SDATE')->textInput() ?>

    <?= $form->field($model, 'LBR_EDATE')->textInput() ?>

    <?= $form->field($model, 'LBR_NM')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
