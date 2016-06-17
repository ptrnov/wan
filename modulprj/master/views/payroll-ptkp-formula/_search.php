<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\PayrollPtkpFormulaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payroll-ptkp-formula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'NO') ?>

    <?= $form->field($model, 'PTKP_NM') ?>

    <?= $form->field($model, 'STT_ID') ?>

    <?= $form->field($model, 'ANAK') ?>

    <?= $form->field($model, 'PTKP_VALUE') ?>

    <?php // echo $form->field($model, 'PPH21') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
