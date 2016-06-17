<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollAsuransiFormulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Asuransi Formulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-asuransi-formula-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Asuransi Formula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ASR_ID',
            'ASR_NM',
            'ASR_PAY_MONTH',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
