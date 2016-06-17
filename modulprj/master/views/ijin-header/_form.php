<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinHeader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ijin-header-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IIJN_NM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IJIN_KET')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
