<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\KepangkatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Kepangkatans');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kepangkatan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Kepangkatan'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'GF_ID',
            'GF_NM',
            'GF_DCRP:ntext',
            'STATUS',
            // 'CREATED_BY',
            // 'UPDATED_BY',
            // 'UPDATED_TIME',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
