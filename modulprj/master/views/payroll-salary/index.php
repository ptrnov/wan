<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollSalarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Salaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-salary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Salary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'KAR_ID',
            'PAY_DAY',
            'PAY_MONTH',
            'PAY_TUNJANGAN',
            // 'PAY_TRANPORT',
            // 'PAY_EAT',
            // 'BONUS',
            // 'PAY_ENTERTAIN',
            // 'STATUS_ACTIVE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
