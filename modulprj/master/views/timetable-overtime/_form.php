<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableOvertime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="timetable-overtime-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TT_GRP_ID')->textInput() ?>

    <?= $form->field($model, 'TT_TYP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TT_TYP_KTG')->textInput() ?>

    <?= $form->field($model, 'TT_SDAYS')->textInput() ?>

    <?= $form->field($model, 'TT_EDAYS')->textInput() ?>

    <?= $form->field($model, 'TT_SDATE')->textInput() ?>

    <?= $form->field($model, 'TT_EDATE')->textInput() ?>

    <?= $form->field($model, 'TT_NOTE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TT_UPDT')->textInput() ?>

    <?= $form->field($model, 'TT_ACTIVE')->textInput() ?>

    <?= $form->field($model, 'RULE_IN')->textInput() ?>

    <?= $form->field($model, 'RULE_OUT')->textInput() ?>

    <?= $form->field($model, 'RULE_TOL_IN')->textInput() ?>

    <?= $form->field($model, 'RULE_TOL_OUT')->textInput() ?>

    <?= $form->field($model, 'RULE_BRK_OUT')->textInput() ?>

    <?= $form->field($model, 'RULE_BRK_IN')->textInput() ?>

    <?= $form->field($model, 'RULE_DRT_OT_DPN')->textInput() ?>

    <?= $form->field($model, 'RULE_DRT_OT_BLK')->textInput() ?>

    <?= $form->field($model, 'RULE_DURATION')->textInput() ?>

    <?= $form->field($model, 'RULE_FRK_DAY')->textInput() ?>

    <?= $form->field($model, 'LEV1_FOT_HALF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LEV1_FOT_HOUR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LEV1_FOT_MAX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LEV1_FOT_MAX_TIME')->textInput() ?>

    <?= $form->field($model, 'LEV2_FOT_HALF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LEV2_FOT_HOUR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LEV2_FOT_MAX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LEV2_FOT_MAX_TIME')->textInput() ?>

    <?= $form->field($model, 'LEV3_FOT_HALF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LEV3_FOT_HOUR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LEV3_FOT_MAX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LEV3_FOT_MAX_TIME')->textInput() ?>

    <?= $form->field($model, 'KOMPENSASI')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
