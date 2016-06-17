<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\TimetableLevelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetable Levels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-level-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timetable Level', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'LVL_ID',
            'LVL_NM',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
