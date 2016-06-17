<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollLoanHeaderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-loan-header-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'KAR_ID') ?>

    <?= $form->field($model, 'TGL') ?>

    <?= $form->field($model, 'PNJ_NM') ?>

    <?= $form->field($model, 'PNJ_PAY_REGULASI') ?>

    <?php // echo $form->field($model, 'PNJ_PAY_MONTH') ?>

    <?php // echo $form->field($model, 'PNJ_PAY') ?>

    <?php // echo $form->field($model, 'STT') ?>

    <?php // echo $form->field($model, 'KET') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
