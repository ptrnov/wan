<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollPtkpFormulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Ptkp Formulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-ptkp-formula-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Ptkp Formula', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NO',
            'PTKP_NM',
            'STT_ID',
            'ANAK',
            'PTKP_VALUE',
            // 'PPH21',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
