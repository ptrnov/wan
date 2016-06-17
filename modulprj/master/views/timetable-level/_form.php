<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableLevel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-level-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'LVL_NM')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
