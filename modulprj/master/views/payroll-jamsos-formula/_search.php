<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollJamsosFormulaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-jamsos-formula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SOS_ID') ?>

    <?= $form->field($model, 'DATA_UPAH') ?>

    <?= $form->field($model, 'JML_SOS') ?>

    <?= $form->field($model, 'JKK') ?>

    <?= $form->field($model, 'JKM') ?>

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
