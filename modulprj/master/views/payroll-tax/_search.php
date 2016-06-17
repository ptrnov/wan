<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollTaxSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-tax-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KAR_ID') ?>

    <?= $form->field($model, 'sDate') ?>

    <?= $form->field($model, 'eDate') ?>

    <?= $form->field($model, 'TTL_UPAH') ?>

    <?= $form->field($model, 'PTKP_NM') ?>

    <?php // echo $form->field($model, 'PTKP_VALUE') ?>

    <?php // echo $form->field($model, 'UPAH_PTKP') ?>

    <?php // echo $form->field($model, 'TTL_PTKP') ?>

    <?php // echo $form->field($model, 'PPH21') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
