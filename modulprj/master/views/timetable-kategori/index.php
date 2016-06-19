<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\TimetableKategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetable Kategoris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-kategori-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Timetable Kategori', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TT_TYPE_KTG',
            'TT_TYPE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
