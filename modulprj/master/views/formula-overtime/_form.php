<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\FormulaOvertime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formula-overtime-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TT_GRP_ID')->textInput() ?>

    <?= $form->field($model, 'FOT_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FOT_JAM1')->textInput() ?>

    <?= $form->field($model, 'FOT_JAM2')->textInput() ?>

    <?= $form->field($model, 'FOT_PERSEN')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
