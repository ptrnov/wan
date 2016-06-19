<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableKategori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-kategori-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TT_TYPE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
