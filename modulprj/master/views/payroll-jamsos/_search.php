<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollJamsosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-jamsos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KAR_ID') ?>

    <?= $form->field($model, 'sDate') ?>

    <?= $form->field($model, 'eDate') ?>

    <?= $form->field($model, 'SOS_ID') ?>

    <?= $form->field($model, 'DATA UPAH') ?>

    <?php // echo $form->field($model, 'JKK') ?>

    <?php // echo $form->field($model, 'JKM') ?>

    <?php // echo $form->field($model, 'JPK') ?>

    <?php // echo $form->field($model, 'JHT_TK') ?>

    <?php // echo $form->field($model, 'JHT') ?>

    <?php // echo $form->field($model, 'SOS_TTL') ?>

    <?php // echo $form->field($model, 'PERSEN_JKK') ?>

    <?php // echo $form->field($model, 'PERSEN_JKM') ?>

    <?php // echo $form->field($model, 'PERSEN_JPK') ?>

    <?php // echo $form->field($model, 'PERSEN_JHT_TK') ?>

    <?php // echo $form->field($model, 'PERSEN_JHT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
