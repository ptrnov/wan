<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableOvertimeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-overtime-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TT_ID') ?>

    <?= $form->field($model, 'TT_GRP_ID') ?>

    <?= $form->field($model, 'TT_TYP') ?>

    <?= $form->field($model, 'TT_TYP_KTG') ?>

    <?= $form->field($model, 'TT_SDAYS') ?>

    <?php // echo $form->field($model, 'TT_EDAYS') ?>

    <?php // echo $form->field($model, 'TT_SDATE') ?>

    <?php // echo $form->field($model, 'TT_EDATE') ?>

    <?php // echo $form->field($model, 'TT_NOTE') ?>

    <?php // echo $form->field($model, 'TT_UPDT') ?>

    <?php // echo $form->field($model, 'TT_ACTIVE') ?>

    <?php // echo $form->field($model, 'RULE_IN') ?>

    <?php // echo $form->field($model, 'RULE_OUT') ?>

    <?php // echo $form->field($model, 'RULE_TOL_IN') ?>

    <?php // echo $form->field($model, 'RULE_TOL_OUT') ?>

    <?php // echo $form->field($model, 'RULE_BRK_OUT') ?>

    <?php // echo $form->field($model, 'RULE_BRK_IN') ?>

    <?php // echo $form->field($model, 'RULE_DRT_OT_DPN') ?>

    <?php // echo $form->field($model, 'RULE_DRT_OT_BLK') ?>

    <?php // echo $form->field($model, 'RULE_DURATION') ?>

    <?php // echo $form->field($model, 'RULE_FRK_DAY') ?>

    <?php // echo $form->field($model, 'LEV1_FOT_HALF') ?>

    <?php // echo $form->field($model, 'LEV1_FOT_HOUR') ?>

    <?php // echo $form->field($model, 'LEV1_FOT_MAX') ?>

    <?php // echo $form->field($model, 'LEV1_FOT_MAX_TIME') ?>

    <?php // echo $form->field($model, 'LEV2_FOT_HALF') ?>

    <?php // echo $form->field($model, 'LEV2_FOT_HOUR') ?>

    <?php // echo $form->field($model, 'LEV2_FOT_MAX') ?>

    <?php // echo $form->field($model, 'LEV2_FOT_MAX_TIME') ?>

    <?php // echo $form->field($model, 'LEV3_FOT_HALF') ?>

    <?php // echo $form->field($model, 'LEV3_FOT_HOUR') ?>

    <?php // echo $form->field($model, 'LEV3_FOT_MAX') ?>

    <?php // echo $form->field($model, 'LEV3_FOT_MAX_TIME') ?>

    <?php // echo $form->field($model, 'KOMPENSASI') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
