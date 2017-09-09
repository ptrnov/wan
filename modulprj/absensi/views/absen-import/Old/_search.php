<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\absensi\models\AbsenImportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="absen-import-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'TERMINAL_ID') ?>

    <?= $form->field($model, 'FINGER_ID') ?>

    <?= $form->field($model, 'MESIN_NM') ?>

    <?= $form->field($model, 'KAR_ID') ?>

    <?php // echo $form->field($model, 'KAR_NM') ?>

    <?php // echo $form->field($model, 'DEP_ID') ?>

    <?php // echo $form->field($model, 'DEP_NM') ?>

    <?php // echo $form->field($model, 'HARI') ?>

    <?php // echo $form->field($model, 'IN_TGL') ?>

    <?php // echo $form->field($model, 'IN_WAKTU') ?>

    <?php // echo $form->field($model, 'OUT_TGL') ?>

    <?php // echo $form->field($model, 'OUT_WAKTU') ?>

    <?php // echo $form->field($model, 'GRP_ID') ?>

    <?php // echo $form->field($model, 'PAY_DAY') ?>

    <?php // echo $form->field($model, 'VAL_PAGI') ?>

    <?php // echo $form->field($model, 'VAL_LEMBUR') ?>

    <?php // echo $form->field($model, 'PAY_PAGI') ?>

    <?php // echo $form->field($model, 'PAY_LEMBUR') ?>

    <?php // echo $form->field($model, 'CREATE_BY') ?>

    <?php // echo $form->field($model, 'CREATE_AT') ?>

    <?php // echo $form->field($model, 'UPDATE_BY') ?>

    <?php // echo $form->field($model, 'UPDATE_AT') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'DCRP_DETIL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
