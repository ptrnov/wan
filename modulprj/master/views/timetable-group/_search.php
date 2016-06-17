<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableGroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-group-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TT_GRP_ID') ?>

    <?= $form->field($model, 'TT_GRP_NM') ?>

    <?= $form->field($model, 'TT_GRP_STT') ?>

    <?= $form->field($model, 'TT_GRP_DEF') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
