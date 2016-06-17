<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\FormulaOvertimeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formula-overtime-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'FOT_ID') ?>

    <?= $form->field($model, 'TT_GRP_ID') ?>

    <?= $form->field($model, 'FOT_NM') ?>

    <?= $form->field($model, 'FOT_JAM1') ?>

    <?= $form->field($model, 'FOT_JAM2') ?>

    <?php // echo $form->field($model, 'FOT_PERSEN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
