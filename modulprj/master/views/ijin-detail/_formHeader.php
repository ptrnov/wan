<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinHeader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ijin-header-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IIJN_NM')->textInput(['maxlength' => true])->label('Exception Name') ?>

    <?= $form->field($model, 'IJIN_KET')->textarea(['rows' => 6])->label('Discription') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
