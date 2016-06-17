<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ijin-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'KAR_ID') ?>

    <?= $form->field($model, 'IJN_SDATE') ?>

    <?= $form->field($model, 'IJN_EDATE') ?>

    <?= $form->field($model, 'IJN_ID') ?>

    <?php // echo $form->field($model, 'IJN_NOTE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
