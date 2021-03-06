<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollAsuransiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Asuransis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-asuransi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Asuransi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'KAR_ID',
            'sDate',
            'eDate',
            'ASR_NM',
            'ASR_PAY_MONTH',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
