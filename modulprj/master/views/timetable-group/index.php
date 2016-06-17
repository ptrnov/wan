<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\TimetableGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetable Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-group-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timetable Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TT_GRP_ID',
            'TT_GRP_NM',
            'TT_GRP_STT',
            'TT_GRP_DEF',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
