<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\TimetableNormal */

$this->title = $model->TT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Timetable Normals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-normal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->TT_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->TT_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'TT_ID',
            'TT_GRP_ID',
            'TT_TYP_KTG',
            'TT_SDAYS',
            'TT_EDAYS',
            'TT_SDATE',
            'TT_EDATE',
            'TT_NOTE',
            'TT_UPDT',
            'TT_ACTIVE',
            'RULE_IN',
            'RULE_OUT',
            'RULE_TOL_IN',
            'RULE_TOL_OUT',
            'RULE_BRK_OUT',
            'RULE_BRK_IN',
            'RULE_DRT_OT_DPN',
            'RULE_DRT_OT_BLK',
            'RULE_DURATION',
            'RULE_FRK_DAY',
            'LEV1_FOT_HALF',
            'LEV1_FOT_HOUR',
            'LEV1_FOT_MAX',
            'LEV1_FOT_MAX_TIME',
            'LEV2_FOT_HALF',
            'LEV2_FOT_HOUR',
            'LEV2_FOT_MAX',
            'LEV2_FOT_MAX_TIME',
            'LEV3_FOT_HALF',
            'LEV3_FOT_HOUR',
            'LEV3_FOT_MAX',
            'LEV3_FOT_MAX_TIME',
            'KOMPENSASI',
        ],
    ]) ?>

</div>
