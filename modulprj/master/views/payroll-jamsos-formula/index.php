<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollJamsosFormulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Jamsos Formulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-jamsos-formula-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Jamsos Formula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SOS_ID',
            'DATA_UPAH',
            'JML_SOS',
            'JKK',
            'JKM',
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
