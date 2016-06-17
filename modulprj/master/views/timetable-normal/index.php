<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\TimetableNormalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetable Normals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-normal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timetable Normal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TT_ID',
            'TT_GRP_ID',
            'TT_TYP',
            'TT_TYP_KTG',
            'TT_SDAYS',
            // 'TT_EDAYS',
            // 'TT_SDATE',
            // 'TT_EDATE',
            // 'TT_NOTE',
            // 'TT_UPDT',
            // 'TT_ACTIVE',
            // 'RULE_IN',
            // 'RULE_OUT',
            // 'RULE_TOL_IN',
            // 'RULE_TOL_OUT',
            // 'RULE_BRK_OUT',
            // 'RULE_BRK_IN',
            // 'RULE_DRT_OT_DPN',
            // 'RULE_DRT_OT_BLK',
            // 'RULE_DURATION',
            // 'RULE_FRK_DAY',
            // 'LEV1_FOT_HALF',
            // 'LEV1_FOT_HOUR',
            // 'LEV1_FOT_MAX',
            // 'LEV1_FOT_MAX_TIME',
            // 'LEV2_FOT_HALF',
            // 'LEV2_FOT_HOUR',
            // 'LEV2_FOT_MAX',
            // 'LEV2_FOT_MAX_TIME',
            // 'LEV3_FOT_HALF',
            // 'LEV3_FOT_HOUR',
            // 'LEV3_FOT_MAX',
            // 'LEV3_FOT_MAX_TIME',
            // 'KOMPENSASI',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
