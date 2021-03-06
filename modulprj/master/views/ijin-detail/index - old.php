<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\IjinDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ijin Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ijin Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'KAR_ID',
            'IJN_SDATE',
            'IJN_EDATE',
            'IJN_ID',
            // 'IJN_NOTE:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
