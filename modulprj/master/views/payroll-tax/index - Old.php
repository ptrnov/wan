<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollTaxSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Taxes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-tax-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Tax', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'KAR_ID',
            'sDate',
            'eDate',
            'TTL_UPAH',
            'PTKP_NM',
            // 'PTKP_VALUE',
            // 'UPAH_PTKP',
            // 'TTL_PTKP',
            // 'PPH21',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
