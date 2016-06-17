<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollLoanDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Loan Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-loan-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Loan Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'KAR_ID',
            'TGL',
            'PNJ_NM',
            'PNJ_PAY',
            'PNJ_FLT',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
