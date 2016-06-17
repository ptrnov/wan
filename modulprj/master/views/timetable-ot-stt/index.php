<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\TimetableOtSttSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetable Ot Stts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-ot-stt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timetable Ot Stt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'STT_OT_DPN',
            'STT_OT_DPN_NM',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
