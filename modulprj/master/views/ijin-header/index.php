<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel modulprj\master\models\IjinHeaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ijin Headers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ijin-header-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ijin Header', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IJN_ID',
            'IIJN_NM',
            'IJIN_KET',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
