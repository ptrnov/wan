<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollSalarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-salary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'KAR_ID') ?>

    <?= $form->field($model, 'PAY_DAY') ?>

    <?= $form->field($model, 'PAY_MONTH') ?>

    <?= $form->field($model, 'PAY_TUNJANGAN') ?>

    <?php // echo $form->field($model, 'PAY_TRANPORT') ?>

    <?php // echo $form->field($model, 'PAY_EAT') ?>

    <?php // echo $form->field($model, 'BONUS') ?>

    <?php // echo $form->field($model, 'PAY_ENTERTAIN') ?>

    <?php // echo $form->field($model, 'STATUS_ACTIVE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
