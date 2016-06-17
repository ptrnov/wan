<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollJamsosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Jamsos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-jamsos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Jamsos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'KAR_ID',
            'sDate',
            'eDate',
            'SOS_ID',
            'DATA UPAH',
            // 'JKK',
            // 'JKM',
            // 'JPK',
            // 'JHT_TK',
            // 'JHT',
            // 'SOS_TTL',
            // 'PERSEN_JKK',
            // 'PERSEN_JKM',
            // 'PERSEN_JPK',
            // 'PERSEN_JHT_TK',
            // 'PERSEN_JHT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
