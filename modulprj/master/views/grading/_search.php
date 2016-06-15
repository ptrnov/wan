<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\GradingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'GF_ID') ?>

    <?= $form->field($model, 'JOBGRADE_ID') ?>

    <?= $form->field($model, 'JOBGRADE_NM') ?>

    <?= $form->field($model, 'JOBGRADE_DCRP') ?>

    <?php // echo $form->field($model, 'JOBGRADE_STS') ?>

    <?php // echo $form->field($model, 'CREATED_BY') ?>

    <?php // echo $form->field($model, 'UPDATED_BY') ?>

    <?php // echo $form->field($model, 'UPDATED_TIME') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
