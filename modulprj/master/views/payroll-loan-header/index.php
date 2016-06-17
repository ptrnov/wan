<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollLoanHeaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Loan Headers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-loan-header-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Loan Header', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'KAR_ID',
            'TGL',
            'PNJ_NM',
            'PNJ_PAY_REGULASI',
            // 'PNJ_PAY_MONTH',
            // 'PNJ_PAY',
            // 'STT',
            // 'KET',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
