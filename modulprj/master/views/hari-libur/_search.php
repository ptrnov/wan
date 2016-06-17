<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\HariLiburSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hari-libur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'LBR_ID') ?>

    <?= $form->field($model, 'TAHUN') ?>

    <?= $form->field($model, 'LBR_SDATE') ?>

    <?= $form->field($model, 'LBR_EDATE') ?>

    <?= $form->field($model, 'LBR_NM') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
