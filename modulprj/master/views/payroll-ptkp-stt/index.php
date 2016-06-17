<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\PayrollPtkpSttSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payroll Ptkp Stts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payroll-ptkp-stt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Payroll Ptkp Stt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'STT_ID',
            'STT_NM',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
